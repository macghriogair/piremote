<?php

namespace App\Http\Controllers;

use App\Entities\Example;
use App\Entities\Plug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Laravel\Lumen\Routing\Controller;

class HomeController extends ControllerBase
{
    public function index()
    {
        $plugs = Plug::all();
        return view('index', ['plugs' => $plugs]);
    }

    public function plug($id, Request $request)
    {
        $plug= Plug::findOrFail($id);
        // $plug->status = $request->get('status');
        // pass to commandhandler

        // return $plug;
        // 11010 01 0
        // $nGroup.$nSwitch.$nAction
        $target = env('DAEMON_TARGET');
        $port = (int) env('DAEMON_PORT');
        $state = $this->daemonSend($target, $port, implode('', $request->all()));
        $plug->status = (int) $state;
        $plug->save();
        return redirect()->route('home');
    }

    private function daemonSend($target, $port, $output)
    {
        // $fp = fsockopen($target, $port, $errno, $errstr, 30) or die("$errstr ($errno)\n");
        $fp = stream_socket_client($target.':'.$port, $errno, $errstr, 30);
        fwrite($fp, $output);
        $state = "";
        while (!feof($fp)) {
            $state .= fgets($fp, 2);
        }
        fclose($fp);
        return $state;
    }
}

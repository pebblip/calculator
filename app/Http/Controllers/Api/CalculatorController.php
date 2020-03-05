<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use pebblip\domain\Calculator;
use pebblip\domain\CommandFactory;
use pebblip\domain\EnvironmentRepository;

class CalculatorController extends Controller
{
    public function index(Request $request, Calculator $calculator, EnvironmentRepository $environmentRepository)
    {
        $commandLine = $request->get('command_line');
        $commands = preg_split('/\s+/', $commandLine);
        $environment = $environmentRepository->get();
        $environment->setOprands(array_slice($commands, 1));

        try {
            $command = CommandFactory::create($commands[0]);
            $command->execute($environment);

            return response()->json([
                'isExit' => $environment->isRequestedQuit(),
                'val' => $environment->getCurrentVal(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'val' => $e->getMessage()
            ], 400);
        }
    }

}

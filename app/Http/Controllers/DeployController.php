<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class DeployController extends Controller
{
    public function deploy(Request $request)
    {
        $githubPayload = $request->getContent();
        $githubHash = $request->header('X-Hub-Signature-256');

        $localToken = config('app.deploy_secret');
        $localHash = "sha256=" . hash_hmac('SHA256', $githubPayload, $localToken);
        $env_branch = '';
        if (hash_equals($githubHash, $localHash) && $request->ref == "refs/heads/deploy" && App::environment('production')) {
            $root_path = base_path();
            $process = new Process(['./deploy.sh']);
            $process->setWorkingDirectory($root_path);
            $process->run(function ($type, $buffer) {
                echo $buffer;
            });
            \Log::info('Deployed until the commit: ' . $request->head_commit['message']);
        }
        exit(200);
    }
}

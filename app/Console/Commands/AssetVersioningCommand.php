<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

class AssetVersioningCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assets:version {--force : Force the operation to run when in production}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an asset version nonce';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $key = $this->generateRandomKey();

        if (! $this->setKeyInEnvironmentFile($key)) {
            return 1;
        }

        $this->info('Asset version nonce set successfully.');

        return 0;
    }

    /**
     * Generate a random string for our version key.
     *
     * @return string
     */
    protected function generateRandomKey(): string
    {
        return Str::random(16);
    }

    /**
     * Set the asset version key in the environment file.
     *
     * @see \Illuminate\Foundation\Console\KeyGenerateCommand::setKeyInEnvironmentFile()
     * @param  string  $key
     * @return bool
     */
    protected function setKeyInEnvironmentFile($key)
    {
        $currentKey = $this->laravel['config']['assets.key'];

        if (strlen($currentKey) !== 0 && (! $this->confirmToProceed())) {
            return false;
        }

        $this->writeNewEnvironmentFileWith($key);

        return true;
    }

    /**
     * Write a new environment file with the given key.
     *
     * @see \Illuminate\Foundation\Console\KeyGenerateCommand::writeNewEnvironmentFileWith()
     * @param  string  $key
     * @return void
     */
    protected function writeNewEnvironmentFileWith($key)
    {
        file_put_contents($this->laravel->environmentFilePath(), preg_replace(
            $this->keyReplacementPattern(),
            'ASSETS_VERSION='.$key,
            file_get_contents($this->laravel->environmentFilePath())
        ));
    }

    /**
     * Get a regex pattern that will match env ASSETS_VERSION with any random key.
     *
     * @see \Illuminate\Foundation\Console\KeyGenerateCommand::keyReplacementPattern()
     * @return string
     */
    protected function keyReplacementPattern()
    {
        $escaped = preg_quote('='.$this->laravel['config']['assets.version'], '/');
        return "/^ASSETS_VERSION{$escaped}/m";
    }
}

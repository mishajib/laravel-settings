<?php

namespace MISHAJIB\Settings\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use MISHAJIB\Settings\Facades\LaravelSettings;

class SettingForgetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'misetting:forget';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will delete setting from table.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $setting_key = $this->ask("Enter setting name to delete (Like - site_title, logo etc)*: ");

        $validator = Validator::make([
            'setting_key' => $setting_key,
        ], [
            'setting_key' => ['bail', 'required', 'string'],
        ]);

        if ($validator->fails()) {
            $this->info("Setting not deleted. See error messages below:");
            $this->error($validator->errors()->first());
            return 1;
        }

        LaravelSettings::forget($setting_key);
        $this->info("Setting removed successfully");
        return 0;
    }
}

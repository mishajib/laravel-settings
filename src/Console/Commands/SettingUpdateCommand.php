<?php

namespace MISHAJIB\Settings\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use MISHAJIB\Settings\Facades\LaravelSettings;

class SettingUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'misetting:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will update your setting value using setting key/name.';

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
        $setting_key   = $this->ask("Enter setting name (Like - site_title, logo etc)*: ");
        $setting_value = $this->ask("Enter setting value (Like - clothing store, gadget store etc)*: ");

        $validator = Validator::make([
            'setting_key'   => $setting_key,
            'setting_value' => $setting_value,
        ], [
            'setting_key'   => ['bail', 'required', 'string', 'unique:settings,id,:id'],
            'setting_value' => ['bail', 'required', 'string'],
        ]);

        if ($validator->fails()) {
            $this->info("Setting not updated. See error messages below:");
            $this->error($validator->errors()->first());
            return 1;
        }

        LaravelSettings::set($setting_key, $setting_value);
        $this->info("Setting updated successfully");
        return 0;
    }
}

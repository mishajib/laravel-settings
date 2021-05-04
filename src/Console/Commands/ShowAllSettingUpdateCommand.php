<?php

namespace MISHAJIB\Settings\Console\Commands;

use Illuminate\Console\Command;
use MISHAJIB\Settings\Facades\LaravelSettings;

class ShowAllSettingUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'misetting:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $settings = LaravelSettings::all();
        if (!$settings->count() > 0) {
            $this->error('No settings found in your table!');
            return 1;
        }
        // style? : The display style (default|borderless|compact|box)

        $this->table(['Setting Key/Name', 'Setting Value'], $settings->makeHidden(['id', 'created_at', 'updated_at'])->toArray(), 'box');
        return 0;
    }
}

<?php


namespace MISHAJIB\Settings;


use MISHAJIB\Settings\Models\Setting;

class LaravelSettingsFacade
{
    /**
     * @param string $key
     * @param string $value
     * @return mixed
     */
    public function set(string $key = "", string $value = "")
    {
        return Setting::updateOrCreate([
            'setting_key' => $key
        ], [
            'setting_value' => $value
        ]);
    }

    /**
     * @param string $key
     * @return null
     */
    public function get(string $key = "")
    {
        $setting = Setting::where('setting_key', $key)->first();
        return $setting ? $setting->setting_value : null;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function forget(string $key = "")
    {
        return Setting::where('setting_key', $key)->delete();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Setting[]
     */
    public function all()
    {
        return Setting::all();
    }

}

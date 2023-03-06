<?php

namespace App\Http\Traits\Setting;

trait SettingTrait
{
    private function getSettings()
    {
        return $this->settingModel::get();
    }

    private function findSetting($id)
    {
        return $this->settingModel::find($id);
    }
}

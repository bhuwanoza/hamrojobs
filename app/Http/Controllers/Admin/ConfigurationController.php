<?php

namespace App\Http\Controllers\Admin;

use App\Model\Configuration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigurationController extends Controller
{
    public function index()
    {
        return view('admin.configurations.index');
    }

    public function postConfiguration(Request $request)
    {
        $inputs = $request->only(
            'site_title',
            'site_description',
            'site_primary_email',
            'site_secondary_email',
            'site_primary_phone',
            'site_secondary_phone',
            'site_address',
            'site_logo',
            'site_favicon',
            'site_map',
            'who_we_are',
            'what_we_do',
            'why_we_do_it',
            'who_we_are',
            'our_mission',
            'our_vision',
            'our_support',
            'corporate_responsibility',
            'visual_page_builder',
            'our_help',
            'facebook_link',
            'twitter_link',
            'googleplus_link',
            'instagram_link',
            'linkedin_link',
            'youtube_link',
            'footer_logo',
            'copyright',
            'keywords',
            'description',
            'active',
            'about_content'
        );

        foreach ($inputs as $inputKey => $inputValue) {
            if ($inputKey == 'site_logo' || $inputKey == 'site_favicon' || $inputKey == 'footer_logo' ) {
                $file = $inputValue;
                // Delete old file
                $this->deleteFile($inputKey);
                // Upload file & get store file name
                $fileName = $this->uploadFile($file);
                $inputValue = $fileName;
            }
            Configuration::updateOrCreate(
                ['configuration_key' => $inputKey],
                ['configuration_value' => $inputValue]
            );
        }
       

        return redirect()->back()->with('success', 'Settings successfully updated!!');
    }

    protected function uploadFile($file)
    {

        $logo = 'setting' . time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/settings/');
        $file->move($destinationPath, $logo);
        return $logo;
    }

    protected function deleteFile($inputKey)
    {

        $configuration = Configuration::where('configuration_key', '=', $inputKey)->first();
        if (isset($configuration)) {
            if (file_exists(public_path('/settings/' . $configuration->configuration_value))) {
                unlink(public_path('/settings/' . $configuration->configuration_value));
            }
        }
    }

    public function getAdsCreate()
    {
        return view('admin.settings.tab-category');
    }

}

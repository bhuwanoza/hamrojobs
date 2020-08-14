<?php


use App\Model\Configuration;
use App\Model\SavedJobs;
use App\Model\AppliedJobs;
use App\Model\JobPosts;
use App\Model\Ads;

function getConfiguration($key)
{
    $config = Configuration::where('configuration_key', '=', $key)->first();
    if (isset($config)) {
        return $config->configuration_value;
    }
    return null;
}

function checkSaved($id)
{
    $loggedUser = Sentinel::getUser();
    if (isset($loggedUser)) {
        if ($loggedUser->jobseeker()->exists()) {
            $saved_job = SavedJobs::where('job_seekers_id', $loggedUser->jobseeker->id)->where('job_posts_id', $id)->first();
            if (isset($saved_job)) {
                return 'saved';
            } else {
                return 'not saved';
            }
        } else {
            return 'user not jobseeker';
        }
    } else {
        return 'not logged in';
    }
}

function checkApplied($id)
{
    $loggedUser = Sentinel::getUser();
    if (isset($loggedUser)) {
        if ($loggedUser->jobseeker()->exists()) {
            $jobpost = JobPosts::findOrFail($id);
            $applied_job = AppliedJobs::where('seeker_id', $loggedUser->jobseeker->id)->where('job_id', $id)->where('company_id', $jobpost->company_id)->first();
            if (isset($applied_job)) {
                return 'already';
            } else {
                return 'not applied';
            }
        } else {
            return 'user not jobseeker';
        }
    } else {
        return 'not logged in';
    }
}

function getAdvertise($position)
{
    switch ($position) {
        case 'Top':
            $ads = Ads::where('status', 'Active')->where('position', $position)->where('expires_on', '>=', \Carbon\Carbon::now())->orderBy('created_at', 'desc')->first();
            return $ads;
            break;
        case 'Middle':
            $ads = Ads::where('status', 'Active')->where('position', $position)->where('expires_on', '>=', \Carbon\Carbon::now())->orderBy('created_at', 'desc')->first();
            return $ads;
            break;

        case 'Bottom':
            $ads = Ads::where('status', 'Active')->where('position', $position)->where('expires_on', '>=', \Carbon\Carbon::now())->orderBy('created_at', 'desc')->first();
            return $ads;
            break;

        case 'Content Right':
            $ads = Ads::where('status', 'Active')->where('position', $position)->where('expires_on', '>=', \Carbon\Carbon::now())->orderBy('created_at', 'desc')->get();
            return $ads;
            break;

        case 'Content Left':
            $ads = Ads::where('status', 'Active')->where('position', $position)->where('expires_on', '>=', \Carbon\Carbon::now())->orderBy('created_at', 'desc')->get();
            return $ads;
            break;
    }
}
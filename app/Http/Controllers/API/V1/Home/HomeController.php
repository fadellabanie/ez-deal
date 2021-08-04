<?php

namespace App\Http\Controllers\API\V1\Home;

use App\Models\Story;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Constants\AppSettingResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\Stories\StoryTinyResource;
use App\Http\Resources\HomeBanners\HomeBannerTinyResource;
use App\Models\AppSetting;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        $stories = Story::MyStory()->WhereDate('end_date', '<=', now())->active()->get();
        $data['stories'] = StoryTinyResource::collection($stories);

        #####################################
        
        $homeBanners = HomeBanner::MyStory()->WhereDate('end_date', '<=', now())->active()->get();
        $data['home_banners'] = HomeBannerTinyResource::collection($homeBanners); 

        #####################################

        $appSetting = AppSetting::get();
        $data['app_setting'] = AppSettingResource::collection($appSetting);

        return $this->respondWithCollection($data);
    }
}

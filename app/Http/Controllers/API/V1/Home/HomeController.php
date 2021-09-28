<?php

namespace App\Http\Controllers\API\V1\Home;

use App\Models\Story;
use App\Models\AppBanner;
use App\Models\AppSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Stories\StoryTinyResource;
use App\Http\Resources\Constants\AppSettingResource;
use App\Http\Resources\HomeBanners\HomeBannerTinyResource;
use App\Http\Traits\Elm;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use Elm;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        if (auth('api')->check()) {
            $city_id =  auth('api')->user()->city_id;
        } else {
            $city_id = 1;
        }
        #####################################

        $topBanners = AppBanner::MyStory($city_id)->top()->WhereDate('end_date', '>=', now())->active()->get();
        //$data['top_banners'] = HomeBannerTinyResource::collection($topBanners);

        ##################################### 

        $cityStories = Story::MyCityStory($city_id)->WhereDate('end_date', '>=', now())->active()->get();
        $data['city_stories'] = StoryTinyResource::collection($cityStories);

        ##################################### 

        $countryStories = Story::MyCountryStory($city_id)->WhereDate('end_date', '>=', now())->active()->get();
        $data['country_stories'] = StoryTinyResource::collection($countryStories);

        #####################################

        $homeBanners = AppBanner::MyStory($city_id)->bottom()->WhereDate('end_date', '>=', now())->active()->get();
        $data['home_banners'] = HomeBannerTinyResource::collection($homeBanners);

        #####################################

        $appSetting = AppSetting::get();
        $data['app_setting'] = AppSettingResource::collection($appSetting);

        return $this->respondWithCollection($data);
    }

    public function testElm(Request $request)
    {
        return $this->login($request->all());
    }
}

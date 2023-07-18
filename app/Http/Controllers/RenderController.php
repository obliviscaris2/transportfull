<?php

namespace App\Http\Controllers;

use App\Models\Mvc;
use App\Models\Link;
use App\Models\Post;
use App\Models\Team;
use App\Models\Unit;
use App\Models\About;
use App\Models\Local;
use App\Models\Other;
use App\Models\Video;
use App\Models\Youth;
use App\Models\Campus;
use App\Models\Message;
use App\Models\MyImage;
use App\Models\Category;
use App\Models\District;
use App\Models\Document;
use App\Models\Orgchart;
use App\Models\Province;
use App\Models\OtherPost;
use App\Models\Information;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Models\CommitteeDetail;
use App\Models\ExecutiveDetail;
use App\Models\UnitCommitteeDetail;
use App\Models\LocalCommitteeDetail;
use App\Models\CampusCommitteeDetail;
use App\Models\CentralCommitteeDetail;
use App\Models\DistrictCommitteeDetail;
use App\Models\ProvinceCommitteeDetail;

class RenderController extends Controller
{
    //
    public function render_about(){
        $sitesetting = SiteSetting::first();
        $mvcs = Mvc::latest()->get()->take(4);
        $links = Link::latest()->get()->take(6);
        $categories = Category::all();
        $abouts = About::first();
        $teams = Team::latest()->get()->take(3);
        return view('portal.render_about', compact('abouts','teams','categories', 'sitesetting', 'links', 'mvcs'));

    }
    public function render_orgchart(){
        $orgchart = Orgchart::first();
        $sitesetting = SiteSetting::first();
        $mvcs = Mvc::latest()->get()->take(4);
        $links = Link::latest()->get()->take(6);
        $categories = Category::all();
        $abouts = About::first();
        $teams = Team::latest()->get()->take(3);
        return view('portal.render_orgchart', compact('orgchart','abouts','teams','categories', 'sitesetting', 'links', 'mvcs'));

    }

    public function render_images(){
        $sitesetting = SiteSetting::first();
        $images = MyImage::all();
        $links = Link::latest()->get()->take(6);
        $notice =OtherPost::whereType('notice')->latest()->get()->take(5);
        $publication = OtherPost::whereType('publication')->latest()->get()->take(5);
        $tender = OtherPost::whereType('tender')->latest()->get()->take(5);
        $rules = OtherPost::whereType('rules')->latest()->get()->take(5);
        $directot = OtherPost::whereType('directot')->latest()->get()->take(5);
        $press = OtherPost::whereType('press')->latest()->get()->take(5);
        $news = OtherPost::whereType('news')->latest()->get()->take(5);
        $other = OtherPost::whereType('other')->latest()->get()->take(5);

        return view('portal.render_images', compact('images','notice','publication','tender','links','rules','directot','press','news','other', 'sitesetting'));
    }

    public function render_videos(){
        $sitesetting = SiteSetting::first();
        $videos = Video::all();
        $links = Link::latest()->get()->take(6);
        $notice =OtherPost::whereType('notice')->latest()->get()->take(5);
        $publication = OtherPost::whereType('publication')->latest()->get()->take(5);
        $tender = OtherPost::whereType('tender')->latest()->get()->take(5);
        $rules = OtherPost::whereType('rules')->latest()->get()->take(5);
        $directot = OtherPost::whereType('directot')->latest()->get()->take(5);
        $press = OtherPost::whereType('press')->latest()->get()->take(5);
        $news = OtherPost::whereType('news')->latest()->get()->take(5);
        $other = OtherPost::whereType('other')->latest()->get()->take(5);


        return view('portal.render_videos', compact('videos','notice','publication','links','tender','rules','directot','press','news','other', 'sitesetting'));

    }

    public function render_notice(){
        $sitesetting = SiteSetting::first();
        $notices = Information::whereType('notice')->latest()->get()->take(20);
        $links = Link::latest()->get()->take(6);

        return view('portal.render_notice', compact('notices', 'sitesetting', 'links'));

    }
    public function render_publication(){
        $sitesetting = SiteSetting::first();
        $publications = Document::whereType('publication')->latest()->get()->take(20);
        $links = Link::latest()->get()->take(6);

        return view('portal.render_publication', compact('publications', 'sitesetting', 'links'));

    }
    public function render_tender(){
        $sitesetting = SiteSetting::first();
        $tender = Information::whereType('tender')->latest()->get()->take(20);
        $links = Link::latest()->get()->take(6);

        return view('portal.render_tender', compact('tender', 'sitesetting', 'links'));

    }
    public function render_rules(){
        $sitesetting = SiteSetting::first();
        $links = Link::latest()->get()->take(6);

        $rules = Document::whereType('policy')->latest()->get()->take(20);
        return view('portal.render_rules', compact('rules', 'sitesetting', 'links'));

    }
    public function render_directot(){
        $sitesetting = SiteSetting::first();
        $directot =Document::whereType('directive')->latest()->get()->take(20);
        $links = Link::latest()->get()->take(6);

        return view('portal.render_directot', compact('directot', 'sitesetting', 'links'));

    }
    public function render_press(){
        $sitesetting = SiteSetting::first();
        $press =Information::whereType('pressrelease')->latest()->get()->take(20);
        $links = Link::latest()->get()->take(6);

        return view('portal.render_press', compact('press', 'sitesetting', 'links'));

    }
    public function render_news(){
        $sitesetting = SiteSetting::first();
        $news = Information::whereType('news')->latest()->get()->take(20);
        $links = Link::latest()->get()->take(6);

        return view('portal.render_news', compact('news', 'sitesetting', 'links'));

    }
    public function render_youthstats(){
        $sitesetting = SiteSetting::first();
        $youth = Youth::whereType('youthstats')->latest()->get()->take(20);
        $links = Link::latest()->get()->take(6);

        return view('portal.render_youthstats', compact('youth', 'sitesetting', 'links'));

    }
    public function render_youthactivity(){
        $sitesetting = SiteSetting::first();
        $youthactivity = Youth::whereType('youthactivity')->latest()->get()->take(20);
        $links = Link::latest()->get()->take(6);

        return view('portal.render_youthactivity', compact('youthactivity', 'sitesetting', 'links'));

    }
    public function render_other(){
        $sitesetting = SiteSetting::first();
        $other = Information::whereType('other')->latest()->get()->take(20);
        $links = Link::latest()->get()->take(6);

        return view('portal.render_other', compact('other', 'sitesetting', 'links'));

    }
    public function render_otherpost(Request $req, $slug=''){
        $sitesetting = SiteSetting::first();
        $otherpost = Document::where("slug", $slug)->first();
        $links = Link::latest()->get()->take(6);

        return view('portal.render_otherpost', compact('otherpost','sitesetting', 'links'));

    }
    public function render_otherpost_news(Request $req, $id=''){
        $sitesetting = SiteSetting::first();
        $otherpost = Document::where("id", $id)->first();
        $links = Link::latest()->get()->take(6);


        return view('portal.render_otherpost_news', compact('otherpost','sitesetting', 'links'));

    }


    public function render_info(Request $req, $slug){
        $sitesetting = SiteSetting::first();
        $otherpost = Information::where("slug", $slug)->first();
        $links = Link::latest()->get()->take(6);

        return view('portal.includes.render_infopost', compact('otherpost', 'sitesetting', 'links'));
    }

    public function render_other_post(Request $req, $slug){
        $sitesetting = SiteSetting::first();
        $otherpost = Other::where("slug", $slug)->first();
        $links = Link::latest()->get()->take(6);

        return view('portal.includes.render_otherpost', compact('otherpost', 'sitesetting', 'links'));
    }

    
    public function render_central_members(){
        $sitesetting = SiteSetting::first();
        $links = Link::latest()->get()->take(6);
        $categories = Category::all();
        $abouts = About::latest()->get()->take(1);
        // $teams = CentralCommitteeDetail::first()->paginate(20);
        $team = CentralCommitteeDetail::first();

        if ($team) {
            $teams = CentralCommitteeDetail::paginate(20);
        } else {
            $teams = collect([]); // An empty collection
        }

        $notice = OtherPost::whereType('notice')->latest()->get()->take(5);
        $publication = OtherPost::whereType('publication')->latest()->get()->take(5);
        $tender = OtherPost::whereType('tender')->latest()->get()->take(5);
        $rules = OtherPost::whereType('rules')->latest()->get()->take(5);
        $directot = OtherPost::whereType('directot')->latest()->get()->take(5);
        $press = OtherPost::whereType('press')->latest()->get()->take(5);
        $news = OtherPost::whereType('news')->latest()->get()->take(5);
        $other = OtherPost::whereType('other')->latest()->get()->take(5);
        $videos = Video::latest()->get()->take(3);
        $images = MyImage::latest()->get()->take(20);

        return view('portal.render_central_members', compact('teams','categories','abouts','notice','publication','tender','rules','directot','press','news','other','videos','images', 'sitesetting', 'links'));

    }

    public function render_province_members(Request $request)
    {
        $sitesetting = SiteSetting::first();
        // $provinceCommitteeDetail = ProvinceCommitteeDetail::all();
        $links = Link::latest()->get()->take(6);

        $selectedProvinceId = $request->input('province_id');
        $provinces = Province::all();

        if ($selectedProvinceId) {
            $provincecommitteedetails = Province::findOrFail($selectedProvinceId)
                ->committeeDetails()
                ->paginate(20);
        } else {
            $provincecommitteedetails = ProvinceCommitteeDetail::paginate(20);
        }

        return view('portal.render_province_members', [
            'provincecommitteedetails' => $provincecommitteedetails,
            'provinces' => $provinces,
            'selectedProvinceId' => $selectedProvinceId,
            'sitesetting' => $sitesetting,
            'page_title' => "Province Committee Members",
            "links" => $links,
        ]);
    }

    public function render_district_members(Request $request)
    {
        $selectedDistrictId = $request->input('district_id');
        $districts = District::all();

        if ($selectedDistrictId) {
            $districtcommitteedetails = District::findOrFail($selectedDistrictId)
                ->districtDetails()
                ->paginate(20);
        } else {
            $districtcommitteedetails = DistrictCommitteeDetail::paginate(20);
        }
        $sitesetting = SiteSetting::first();
        // $committee = CommitteeDetail::latest()->get();
        $links = Link::latest()->get()->take(6);

        return view('portal.render_district_members', [
            "districtcommitteedetails" => $districtcommitteedetails,
            "selectedDistrictId" => $selectedDistrictId,
            'districts' => $districts,
            "sitesetting" => $sitesetting,
            "page_title" => "District Committees",
            "links" => $links,
        ]);
    }

    public function render_local_members(Request $request)
    {
        $selectedLocalId = $request->input('local_id');
        $locals = Local::all();

        if ($selectedLocalId) {
            $localcommitteedetails = Local::findOrFail($selectedLocalId)
                ->localDetails()
                ->paginate(20);
        } else {
            $localcommitteedetails = LocalCommitteeDetail::paginate(20);
        }

        $sitesetting = SiteSetting::first();

        $links = Link::latest()->get()->take(6);

        return view('portal.render_local_members', [
            "localcommitteedetails" => $localcommitteedetails,
            "selectedLocalId" => $selectedLocalId,
            'locals' => $locals,
            "sitesetting" => $sitesetting,
            "page_title" => "Local Committees",
            "links" => $links,
        ]);
    }

    public function render_campus_members(Request $request)
    {
        $selectedCampusId = $request->input('campus_id');
        $campuses = Campus::all();

        if ($selectedCampusId) {
            $campuscommitteedetails = Campus::findOrFail($selectedCampusId)
                ->campusDetails()
                ->paginate(20);
        } else {
            $campuscommitteedetails = CampusCommitteeDetail::paginate(20);
        }

        $sitesetting = SiteSetting::first();

        $links = Link::latest()->get()->take(6);

        return view('portal.render_campus_members', [
            "campuscommitteedetails" => $campuscommitteedetails,
            "selectedCampusId" => $selectedCampusId,
            'campuses' => $campuses,
            "sitesetting" => $sitesetting,
            "page_title" => "Campus Committees",
            "links" => $links,
        ]);
    }

    public function render_unit_members(Request $request)
    {
        $selectedUnitId = $request->input('unit_id');
        $units = Unit::all();

        if ($selectedUnitId) {
            $unitcommitteedetails = Unit::findOrFail($selectedUnitId)
                ->unitDetails()
                ->paginate(20);
        } else {
            $unitcommitteedetails = UnitCommitteeDetail::paginate(10);
        }

        $sitesetting = SiteSetting::first();

        $links = Link::latest()->get()->take(6);

        return view('portal.render_unit_members', [
            "unitcommitteedetails" => $unitcommitteedetails,
            "selectedUnitId" => $selectedUnitId,
            'units' => $units,
            "sitesetting" => $sitesetting,
            "page_title" => "Unit Committees",
            "links" => $links,
        ]);
    }

    public function render_administrative()
    {
        $sitesetting = SiteSetting::first();
        $administrative = Message::whereType('administrativehead')->latest()->get()->take(1);
        $links = Link::latest()->get()->take(6);

        return view('portal.render_administrative', [
            "administrative" => $administrative,
            "sitesetting" => $sitesetting,
            "page_title" => "Message from the Administrative Head",
            "links" => $links,
        ]);
    }

    public function render_chairperson()
    {
        $sitesetting = SiteSetting::first();
        $chairperson = Message::whereType('chairperson')->latest()->get()->take(1);
        $links = Link::latest()->get()->take(6);

        return view('portal.render_chairperson', [
            "chairperson" => $chairperson,
            "sitesetting" => $sitesetting,
            "page_title" => "Message from Chairperson",
            "links" => $links,

        ]);
    }

    public function contact_page(){

        $sitesetting = SiteSetting::first();
        $links = Link::latest()->get()->take(6);

        return view('portal.contact_page', [
            'sitesetting' => $sitesetting,
            "links" => $links,
        ]);

    }



    public function render_posts($slug='')
    {
        # code...
        $sitesetting = SiteSetting::first();
        $post = Post::where("slug", $slug)->first();
        $posts = Post::all();
        $links = Link::latest()->get()->take(6);
        $postslist = Post::all()->except($post->id);
        return view('portal.render_post',[
            'sitesetting'=>$sitesetting,
            'posts'=>$posts,
            'post'=>$post,
            'links'=>$links,
            'postslist'=>$postslist
        ]);
    }

    public function render_all_posts()
    {
        # code...
        $sitesetting = SiteSetting::first();
        $posts = Post::all();
        $links = Link::latest()->get()->take(6);
        $postslist = Post::latest()->get()->take(6);
        return view('portal.render_all_posts',[
            'sitesetting'=>$sitesetting,
            'posts'=>$posts,
            'links'=>$links,
            'postslist'=>$postslist
        ]);
    }

}

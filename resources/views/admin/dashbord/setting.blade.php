@extends('admin.layouts.master-soyuz')
@section('title','Edit Dashboard Setting')
@section('body')

@component('admin.component.breadcumb',['thirdactive' => 'active'])

@slot('heading')
{{ __('Home') }}
@endslot

@slot('menu1')
{{ __("Dashboard Setting") }}
@endslot

@slot('menu2')
{{ __("Dashboard Setting") }}
@endslot

@endcomponent

<div class="contentbar">
  <div class="row">
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      @foreach($errors->all() as $error)
      <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      @endforeach
    </div>
    @endif
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title">{{ __('Edit') }} {{ __('Dashboard Setting') }}</h5>
        </div>
        <div class="card-body">
          <ul class="nav nav-tabs custom-tab-line mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                aria-controls="pills-home" aria-selected="true">Main Screen Setting</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false">Facebook Widget Setting</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                aria-controls="pills-contact" aria-selected="false">Twitter Widget Setting</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="insta-contact-tab" data-toggle="pill" href="#pills-insta" role="tab"
                aria-controls="pills-insta" aria-selected="false">Instagram Widget Setting</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <form action="{{ route('admin.dash.update',$dashsetting->id) }}" method="POST">
                {{ csrf_field() }}
                  <table class="w-100 table table-hover">
                    <thead>
                      <tr>
                        <th>Widget Name</th>
                        <th>Action</th>
                        <th>Max Item</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>
                          Latest Order
                        </td>
                        <td>
                          <label class="switch">
                            <input class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                              {{ $dashsetting->lat_ord==1 ? "checked" :"" }}>
                            <span class="knob"></span>
                            <input type="hidden" name="lat_ord" value="{{$dashsetting->lat_ord}}" id="order_status">

                          </label>

                        </td>

                        <td class="{{ $dashsetting->lat_ord==0 ? 'display-none' : ''}}"><input class="form-control" min="1"
                            name="max_item_ord" type="number" value="{{ $dashsetting->max_item_ord }}"></td>

                      </tr>

                      <tr>
                        <td>
                          Recently Added Product
                        </td>
                        <td>
                          <label class="switch">
                            <input class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                              {{ $dashsetting->rct_pro==1 ? "checked" :"" }}>
                            <span class="knob"></span>
                            <input type="hidden" name="rct_pro" value="{{$dashsetting->rct_pro}}" id="product_status">

                          </label>

                        </td>

                        <td class="{{ $dashsetting->rct_pro == 0 ? 'display-none' : '' }}"><input class="form-control" min="1"
                            name="max_item_pro" max="5" type="number" value="{{ $dashsetting->max_item_pro }}"></td>

                      </tr>

                      <tr>
                        <td>
                          Recent Store Request
                        </td>
                        <td>
                          <label class="switch">
                            <input class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                              {{ $dashsetting->rct_str==1 ? "checked" :"" }}>
                            <span class="knob"></span>
                            <input type="hidden" name="rct_str" value="{{$dashsetting->rct_str}}" id="store_status">

                          </label>

                        </td>

                        <td class="{{ $dashsetting->rct_str == 0 ? 'display-none' : ''}}"><input class="form-control" min="1"
                            name="max_item_str" type="number" value="{{ $dashsetting->max_item_str }}"></td>

                      </tr>

                      <tr>
                        <td>
                          Recent Customer
                        </td>
                        <td>
                          <label class="switch">
                            <input class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                              {{ $dashsetting->rct_cust==1 ? "checked" :"" }}>
                            <span class="knob"></span>
                            <input type="hidden" name="rct_cust" value="{{$dashsetting->rct_cust}}" id="cust_status">

                          </label>

                        </td>

                        <td><input class="form-control {{ $dashsetting->rct_cust == 0 ? 'display-none' : ""}}" min="1"
                            name="max_item_cust" max="12" type="number" value="{{ $dashsetting->max_item_cust }}"></td>

                      </tr>


                    </tbody>
                  </table>
                  <div class="form-group">
                    <button @if(env('DEMO_LOCK')==0) type="reset" @else disabled
                      title="This operation is disabled is demo !" @endif class="btn btn-danger-rgba"><i
                        class="fa fa-ban"></i> Reset</button>
                    <button @if(env('DEMO_LOCK')==0) type="submit" @else disabled
                      title="This operation is disabled is demo !" @endif class="btn btn-primary-rgba"><i
                        class="fa fa-check-circle"></i>
                      Update</button>
                  </div>
                  <div class="clear-fix"></div>
              </form>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <form class="col-md-12" action="{{ route('fb.update',$dashsetting->id) }}" method="POST">
                {{ csrf_field() }}
                <label for="">Facebook Page ID:</label>
                <input type="text" placeholder="Enter Facebook Page ID" name="fb_page_id" class="form-control"
                  value="{{ $dashsetting->fb_page_id }}" />
                <br>
                <div class="eyeCy">
                  <label>Facebook Page Access Token:</label>
                  <input placeholder="Enter Page Access Token" type="password" id="token" class="form-control"
                    name="fb_page_token" value="{{ $dashsetting->fb_page_token }}" />
                  <span toggle="#token" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                </div>
                <br>
                <label for="">Status:</label>
                <label class="switch">
                  <input class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                    {{ $dashsetting->fb_wid==1 ? "checked" :"" }}>
                  <span class="knob"></span>
                  <input type="hidden" name="fb_wid" value="{{$dashsetting->fb_wid}}" id="fb_status">

                </label>

                <br>

                <br>
                <div class="form-group">
                  <button @if(env('DEMO_LOCK')==0) type="reset" @else disabled
                    title="This operation is disabled is demo !" @endif class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                    Reset</button>
                  <button @if(env('DEMO_LOCK')==0) type="submit" @else disabled
                    title="This operation is disabled is demo !" @endif class="btn btn-primary-rgba"><i
                      class="fa fa-check-circle"></i>
                    Update</button>
                </div>
                <div class="clear-both"></div>
              </form>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <form class="col-md-12" action="{{ route('tw.update',$dashsetting->id) }}" method="POST">
                {{ csrf_field() }}
                <label for="">Twitter Username:</label>
                <input type="text" placeholder="Enter Twitter Username" name="tw_username" class="form-control"
                  value="{{ $dashsetting->tw_username }}" />
                <br>
                <label class="switch">
                  <input class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                    {{ $dashsetting->tw_wid==1 ? "checked" :"" }}>
                  <span class="knob"></span>
                  <input type="hidden" name="tw_wid" value="{{$dashsetting->tw_wid}}" id="insta_status">

                </label>

                <br>
                <div class="form-group">
                  <button @if(env('DEMO_LOCK')==0) type="reset" @else disabled
                    title="This operation is disabled is demo !" @endif class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                    Reset</button>
                  <button @if(env('DEMO_LOCK')==0) type="submit" @else disabled
                    title="This operation is disabled is demo !" @endif class="btn btn-primary-rgba"><i
                      class="fa fa-check-circle"></i>
                    Update</button>
                </div>
                <div class="clear-both"></div>
              </form>
            </div>
            <div class="tab-pane fade" id="pills-insta" role="tabpanel" aria-labelledby="pills-insta-tab">
              <form class="col-md-12" action="{{ route('ins.update',$dashsetting->id) }}" method="POST">
                {{ csrf_field() }}
                <label for="">Instagram Username:</label>
                <input type="text" placeholder="Enter Instagram Username" name="inst_username" class="form-control"
                  value="{{ $dashsetting->inst_username }}" />
                <br>
                <label class="switch">
                  <input class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"
                    {{ $dashsetting->insta_wid==1 ? "checked" :"" }}>
                  <span class="knob"></span>
                  <input type="hidden" name="insta_wid" value="{{$dashsetting->insta_wid}}" id="insta_status">

                </label>

                <br>

                <div class="form-group">
                  <button @if(env('DEMO_LOCK')==0) type="reset" @else disabled
                    title="This operation is disabled is demo !" @endif class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                    Reset</button>
                  <button @if(env('DEMO_LOCK')==0) type="submit" @else disabled
                    title="This operation is disabled is demo !" @endif class="btn btn-primary-rgba"><i
                      class="fa fa-check-circle"></i>
                    Update</button>
                </div>
                <div class="clear-both"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<div class="slider-container light rev_slider_wrapper" style="height: 650px;">
  <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 650, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'navigation' : {'arrows': { 'enable': true, 'style': 'arrows-style-1 arrows-big arrows-dark' }, 'bullets': {'enable': false, 'style': 'bullets-style-1 bullets-color-primary', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
    <ul>
      @foreach($slides as $slide)
      <li data-transition="fade">
        <img src="{{ $slide->image}}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">


        <!-- <img src="img/slides/slide-corporate-3-1.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg"> -->


        <div class="tp-caption" data-x="['right','right','center','center']" data-hoffset="['146','146','150','245']" data-y="center" data-voffset="['-70','-70','-70','-125']" data-start="1000" data-transform_in="x:[300%];opacity:0;s:500;" data-transform_idle="opacity:0.5;s:500;">
          <img src="{{ asset('img/slides/slide-title-border-light.png') }}" alt="">
        </div>

        <div class="tp-caption text-color-dark font-weight-normal" data-x="['right','right','center','center']" data-hoffset="['200','200','0','0']" data-y="center" data-voffset="['-72','-72','-72','-125']" data-start="700" data-fontsize="['22','22','22','40']" data-lineheight="['40','40','40','74']" data-transform_in="y:[-50%];opacity:0;s:500;">
          {{ $slide->title }}
        </div>

        <div class="tp-caption d-none d-md-block" data-frames='[{"delay":1500,"speed":500,"frame":"0","from":"opacity:0;x:-10%;","to":"opacity:1;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-x="['right','right','center','center']" data-hoffset="['384','384','-90','-165']" data-y="center" data-voffset="['-49','-49','-49','-86']">
          <img src="{{ asset('img/slides/slide-blue-line.png') }}" alt="">
        </div>

        <div class="tp-caption" data-x="['right','right','center','center']" data-hoffset="['452','452','-150','-245']" data-y="center" data-voffset="['-70','-70','-70','-125']" data-start="1000" data-transform_in="x:[-300%];opacity:0;s:500;" data-transform_idle="opacity:0.5;s:500;">
          <img src="{{ asset('img/slides/slide-title-border-light.png') }}" alt="">
        </div>

        <h1 class="tp-caption font-weight-extra-bold text-color-dark negative-ls-2" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-x="['right','right','center','center']" data-hoffset="['146','146','0','0']" data-voffset="['-5','-5','-5','0']" data-y="center" data-fontsize="['50','50','50','90']" data-lineheight="['55','55','55','95']">
          {{ $slide->description }}
        </h1>

        @if($slide->button_text)
        <div class="tp-caption font-weight-light text-color-dark" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-x="['right','right','center','center']" data-hoffset="['146','146','0','0']" data-y="center" data-voffset="['60','60','60','125']" data-fontsize="['18','18','18','50']" data-lineheight="['34','34','34','100']">
          <a href="{{ $slide->button_url }}" class="btn btn-primary">{{ $slide->button_text }}</a>
        </div>
        @endif
      </li>
      @endforeach
    </ul>
  </div>
</div>


                <div id="carousel-Ski_Deck-dynamic" class="carousel slide carousel-fade" data-ride="carousel" style="clear:both;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @if ($images = App\Screenshot::all())
                            @foreach ($images as $image)
                                @if ($image->category->id == $post['category_id'] &&  App\Post::orderBy('updated_at')->first()->id == App\Screenshot::orderBy('id')->first()->id)
									<li data-target="#carousel-Ski_Deck-dynamic" data-slide-to="{{ $image->id }}" class="active"></li>
								@elseif ($image->category->id == $post['category_id'])
									<li data-target="#carousel-Ski_Deck-dynamic" data-slide-to="{{ $image->id }}"></li>
                                @endif
                            @endforeach

                        @endif
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @if ($images = App\Screenshot::all())
                            @foreach ($images as $image)
                                @if ($image->id == App\Screenshot::orderBy('id')->first()->id)
                                        <div class="carousel-item active" style="background-color: blue;">
                                            <img class="d-block w-100" src='{{ asset("/storage/images/screenshots/$image->cover_image") }}' alt="{{ $image->cover_image }}">
		      <div class="carousel-caption d-none d-md-block">
		        <ul style="display: block;">
		            <li style="display: inline-block; float: left; list-style: none;">
		               <ul style="list-style-type: none; float: left;">
		                    <li style="float: left; margin: 0;">
		                        <a href="https://www.facebook.com/pg/SkiDeck/posts/?ref=page_internal" target="_blank" rel="noopener">
		                            <img style="height: 40px; max-width: 100px; margin: 0; padding: 0;" src="/img/facebook-logo-png-5a35528eaa4f08.7998622015134439826977.jpg" />
		                        </a>
		                    </li>
				            <li style="float: left; margin: 0;">
				                <p>|</p>
				            </li>
				        <li style="display: inline-flex; float: left; list-style: none;">
				            <ul style="float: right; text-align: right; display: flex; margin-bottom: 40px;">
				               <li style="display: inline-flex; margin: 0; padding: 0; float: right; font-size: 20px;">
				                    <ul>
                                       <!-- <li style="float: left; list-style: none; text-shadow: #000 1px 1px 2px;"></li> -->
                       <li style="float: left; margin: 0;">
                           <p style="text-shadow: #000 1px 2px 2px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                           <!-- <span id="arrow">SCROLL DOWN</span> <--><b>Please call: &nbsp; &nbsp; </b></-->
                           <!-- <span id="arrow">SCROLL DOWN</span> --><strong>011 781 6528</strong>
                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </p>
                           <p style="text-shadow: #000 1px 2px 2px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                           <!-- <span id="arrow">SCROLL DOWN</span> <--><b>for lesson and party bookings</b></-->
                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </p>
                       </li>
                                       <!-- {{-- <li style="float: left; list-style: none; text-shadow: #000 1px 1px 2px;"><strong>info@ski.co.za</strong></li> --}} -->
		                   </ul>
		               </li>
		               <li style="float: left; margin: 0;">
		                   <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; |</p>
		               </li>
		               <li style="float: left; margin: 0;">
		                   <a href="https://www.youtube.com/channel/UC2AO1WaeXg5q6d5hAUSnTLQ" target="_blank" rel="noopener">
		                   	<img style="height: 40px; max-width: 60px; margin: 0; padding: 0;" src="/img/youtube-image.jpg" />
		                   </a>
		               </li>
		             </ul>
		           </li>
		         </ul>
		      </div>
                                        </div>
                                    @elseif ($image->category->id == $post['category_id'])
                                        <div class="carousel-item" style="background-color: blue;">
                                            <img class="d-block w-100" src='{{ asset("/storage/images/screenshots/$image->cover_image") }}' alt="{{ $image->cover_image }}">
		      <div class="carousel-caption d-none d-md-block">
		        <ul style="display: block;">
		            <li style="display: inline-block; float: left; list-style: none;">
		               <ul style="list-style-type: none; float: left;">
		                    <li style="float: left; margin: 0;">
		                        <a href="https://www.facebook.com/pg/SkiDeck/posts/?ref=page_internal" target="_blank" rel="noopener">
		                            <img style="height: 40px; max-width: 100px; margin: 0; padding: 0;" src="/img/facebook-logo-png-5a35528eaa4f08.7998622015134439826977.jpg" />
		                        </a>
		                    </li>
				            <li style="float: left; margin: 0;">
				                <p>|</p>
				            </li>
				        <li style="display: inline-flex; float: left; list-style: none;">
				            <ul style="float: right; text-align: right; display: flex; margin-bottom: 40px;">
				               <li style="display: inline-flex; margin: 0; padding: 0; float: right; font-size: 20px;">
				                    <ul>
		                               <!-- <li style="float: left; list-style: none; text-shadow: #000 1px 1px 2px;"></li> -->
		               <li style="float: left; margin: 0;">
                           <p style="text-shadow: #000 1px 2px 2px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                           <!-- <span id="arrow">SCROLL DOWN</span> <--><b>Please call: &nbsp; &nbsp; </b></-->
                           <!-- <span id="arrow">SCROLL DOWN</span> --><strong>011 781 6528</strong>
                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </p>
                           <p style="text-shadow: #000 1px 2px 2px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                           <!-- <span id="arrow">SCROLL DOWN</span> <--><b>for lesson and party bookings</b></-->
                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; </p>
		               </li>
		                               <!-- {{-- <li style="float: left; list-style: none; text-shadow: #000 1px 1px 2px;"><strong>info@ski.co.za</strong></li> --}} -->
		                           </ul>
		                       </li>
		                   </ul>
		               </li>
		               <li style="float: left; margin: 0;">
		                   <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; |</p>
		               </li>
		               <li style="float: left; margin: 0;">
		                   <a href="https://www.youtube.com/channel/UC2AO1WaeXg5q6d5hAUSnTLQ" target="_blank" rel="noopener">
		                   	<img style="height: 40px; max-width: 60px; margin: 0; padding: 0;" src="/img/youtube-image.jpg" />
		                   </a>
		               </li>
		             </ul>
		           </li>
		         </ul>
		      </div>
                                        </div>
                                @endif
                            @endforeach

                        @endif
                    </div>
                  <a class="carousel-control-prev" href="#carousel-Ski_Deck-dynamic" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carousel-Ski_Deck-dynamic" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
        
        
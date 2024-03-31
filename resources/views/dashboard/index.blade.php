<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <p><a href="{{ route('profile.edit') }}">Edit Profile</a></p>

            <div class="card">
                <div class="card-header">
                     {{ __('Dashboard') }} 
                     <span style="float:right"><a href="{{ route('profile.upload-picture-form') }}" class="btn btn-primary">Upload New Profile Picture</a></span>
                </div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <div class="row"> 
                   @if(!$user->profile->profile_picture)
                   @else
                    <img src="{{ Storage::url($user->profile->profile_picture) }}" alt="Profile Picture" style="width: 150px; border-radius: 25%;">
                   @endif
                   @if($user->profile->bio)
                    <span style="float:right;width: 75%;">
                      {!!$user->profile->bio!!}
                    </span>
                   @else
                     {{$user->birth_date}}<BR>
                     {{$user->phone_number}}
                   @endif
 
                   @if($user->profile->public == 1)
                     {{--$user->profile--}}
                      <a href="{{ route('profile.show', ['user' => $user->id]) }}">View Public Profile</a>
                   @else
                   @endif
                 </div>
                  <hr>
            


                   
                <div class="row"> 
                  
@if ($friends->count() > 0)
        <ul>
            @foreach ($friends as $friend)
                <li>{{ $friend->name }}</li>
            @endforeach
        </ul>
        {{--$friends--}}
        {{--$friendpics--}}
    @else
        <p>You don't have any friends yet.</p>
    @endif


                </div>
                <hr>



















                <div class="row">
                        @if(count($pictures) > 0)
                            @foreach($pictures as $picture)
                    <div class="col-md-4">
                       <div id="{{ $picture->id }}"  style="max-width: 160px;">
                         <div style="position: relative;">
                            <img src="{{ Storage::url($picture->picture_location) }}" alt="Picture" style="width: 150px; border-radius: 5%;">
                             @if($picture->id == $user->profile->picture_library)
                               <p>Profile Picture</p>
                             @else
                               <span style="position: absolute; top: 0; right: 0; ">
                                <form action="{{ route('delete-picture', ['id' => $picture->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                  <button type="submit" class="btn btn-danger" style="font-size: 10px;"><i class="fa fa-trash"></i></button>
                                </form>
                               </span>
                                  <br>
                               <span style="position: absolute; bottom: 0;">
                                 <form method="POST" action="{{ route('change-profile-picture') }}">
                                   @csrf
                                     <div class="mb-3">
                                       <input type='hidden' name='userid' value="{{ $picture->user_id }}">
                                       <input type='hidden' name='pictur_library' value="{{ $picture->id }}">
                                       <input type='hidden' name='picture_location' value="{{ $picture->picture_location }}">
                                     </div>
                                   <button type="submit" class="btn btn-primary" style="width:150px;">Make Profile</button>
                                 </form>
                               </span>
                             @endif
                                <br>
                         </div>
                        </div>
                    </div>
                            @endforeach
                </div>
                @else
                        <p>No pictures in the library.</p>
                @endif
                    <hr>
                    <form method="POST" action="{{ route('picture-library.upload') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                         <label for="profile_picture" class="form-label">Upload Picture to the Gallery</label>
                         <div class="col-md-9 mb-3">            
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                         </div>
                         <div class="col-md-3 mb-3">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                         </div>
                      </div>
                    </form>
            </div>
      



        </div>




    </div>


</div>



<h2>Your Friends</h2>
    @if ($friends->count() > 0)
        <ul>
            @foreach ($friends as $friend)
                <li>{{ $friend->name }}</li>
            @endforeach
        </ul>
    @else
        <p>You don't have any friends yet.</p>
    @endif

    <h2>Sent Friend Requests</h2>
    @if ($sentRequests->count() > 0)
        <ul>
            @foreach ($sentRequests as $request)
                <li>{{ $request->name }}</li>
            @endforeach
        </ul>
    @else
        <p>You haven't sent friend requests.</p>
    @endif

    <h2>Pending Friend Requests</h2>
@if ($receivedRequests->count() > 0)
    <ul>
        @foreach ($receivedRequests as $request)
            <li>{{ $request->name }} 
                @if ($request->pivot->user_id == $user->id)
                    <form action="{{ route('approve-friend-request', ['friend' => $request->id]) }}" method="post">
                        @csrf
                        <button type="submit">Approve</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>You don't have pending friend requests.</p>
@endif

<a href="{{route('users.index')}}">
Browser all users </a>


<BR>







{{-- 




  <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Resume</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title">Sumary</h3>
            <div class="resume-item pb-0">
              <h4>Alex Smith</h4>
              <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>
              <ul>
                <li>Portland par 127,Orlando, FL</li>
                <li>(123) 456-7891</li>
                <li>alice.barkley@example.com</li>
              </ul>
            </div>

            <h3 class="resume-title">Education</h3>
            <div class="resume-item">
              <h4>Master of Fine Arts &amp; Graphic Design</h4>
              <h5>2015 - 2016</h5>
              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
              <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>
            </div>
            <div class="resume-item">
              <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
              <h5>2010 - 2014</h5>
              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
              <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Professional Experience</h3>
            <div class="resume-item">
              <h4>Senior graphic design specialist</h4>
              <h5>2019 - Present</h5>
              <p><em>Experion, New York, NY </em></p>
              <ul>
                <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>
                <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>
                <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>
                <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>
              </ul>
            </div>
            <div class="resume-item">
              <h4>Graphic design specialist</h4>
              <h5>2017 - 2018</h5>
              <p><em>Stepping Stone Advertising, New York, NY</em></p>
              <ul>
                <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->


--}}






























</div>
@endsection

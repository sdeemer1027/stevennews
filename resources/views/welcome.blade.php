@extends('layouts.app')

@section('content')
<style>
        /* Custom CSS for accordion button color */
        .accordion-button {
            color: #e97855; /* Text color for unexpanded accordion buttons */
        /* background-color: #007bff; Background color for unexpanded accordion buttons     */
        }

        .accordion-button:not(.collapsed) {
            color: #ffffff; /* Text color for expanded accordion buttons */
            background-color: #0056b3; /* Background color for expanded accordion buttons */
        }
    </style>
<div class="container">
  <!-- Content here -->
  <div class="row">
    <div class="col-md-6">
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
           Steven.News
          </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <strong>You are Looking at Steven.news</strong> This site is a concept based on Steven and his news stories as well as life news articles.
            Steven, as we will call him from this point forward as Steve, Was born in New Jersey. A small town named Hackettstown.

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
           Family
          </button>
          </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Steve's Family was Dad / Mom - Older Brother and Younger Sister<BR>
                <!--
                  <ul id="familyInfo">
                   <li data-bs-toggle="collapse" data-bs-target="#collapseSteve" aria-expanded="false" aria-controls="collapseSteve">Steve</li>
                   <li data-bs-toggle="collapse" data-bs-target="#collapseDad" aria-expanded="false" aria-controls="collapseDad">Gilbert (dad)</li>
                   <li data-bs-toggle="collapse" data-bs-target="#collapseMom" aria-expanded="false" aria-controls="collapseMom">Raylene (mom)</li>
                   <li data-bs-toggle="collapse" data-bs-target="#collapseBrother" aria-expanded="false" aria-controls="collapseBrother">Scott (brother)</li>
                   <li data-bs-toggle="collapse" data-bs-target="#collapseSister" aria-expanded="false" aria-controls="collapseSister">Suzanne (sister)</li>
                  </ul>
                -->

 <!-- Add accordions for each family member -->
      <div class="accordion" id="accordionFamily">
        <div class="accordion-item">
          <h3 class="accordion-header" id="headingDad">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDad" aria-expanded="false" aria-controls="collapseDad">
              Gilbert (Dad)
            </button>
          </h3>
          <div id="collapseDad" class="accordion-collapse collapse" aria-labelledby="headingDad" data-bs-parent="#accordionFamily">
            <div class="accordion-body">
            Dad Passed away December 2019 he was 79 years old
            </div>
          </div>
        </div>
        <!-- Repeat similar structure for other family members -->


        <div class="accordion-item">
          <h3 class="accordion-header" id="headingMom">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMom" aria-expanded="false" aria-controls="collapseMom">
              Raylene (Mom)
            </button>
          </h3>
          <div id="collapseMom" class="accordion-collapse collapse" aria-labelledby="headingMom" data-bs-parent="#accordionFamily">
            <div class="accordion-body">
              Mom Passed away October 2006 she was 65 years old
            </div>
          </div>
        </div>
        <!-- Repeat similar structure for other family members -->



        <div class="accordion-item">
          <h3 class="accordion-header" id="headingBrother">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrother" aria-expanded="false" aria-controls="collapseBrother">
              Scott (Brother)
            </button>
          </h3>
          <div id="collapseBrother" class="accordion-collapse collapse" aria-labelledby="headingBrother" data-bs-parent="#accordionFamily">
            <div class="accordion-body">
              Scott Passed away January 2018 he was 55 years old
            </div>
          </div>
        </div>
        <!-- Repeat similar structure for other family members -->



        <div class="accordion-item">
          <h3 class="accordion-header" id="headingSteve">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSteve" aria-expanded="false" aria-controls="collapseSteve">
              Steve
            </button>
          </h3>
          <div id="collapseSteve" class="accordion-collapse collapse" aria-labelledby="headingSteve" data-bs-parent="#accordionFamily">
            <div class="accordion-body">
              <!-- Content for Gilbert (dad) accordion -->
            </div>
          </div>
        </div>
        <!-- Repeat similar structure for other family members -->




        <div class="accordion-item">
          <h3 class="accordion-header" id="headingSister">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSister" aria-expanded="false" aria-controls="collapseSister">
              Suzanne (Sister)
            </button>
          </h3>
          <div id="collapseSister" class="accordion-collapse collapse" aria-labelledby="headingSister" data-bs-parent="#accordionFamily">
            <div class="accordion-body">
              <!-- Content for Gilbert (dad) accordion -->
            </div>
          </div>
        </div>
        <!-- Repeat similar structure for other family members -->







      </div>






              </div>
            </div>
          </div>



          <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Goals
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        Goals of life: <br>
         @if(isset($abc))
        <p>{{ $abc['data'] }}</p>
         @endif


      </div>
    </div>
  </div>
</div>
</div>

 <div class="col-md-6 d-flex">

<div class="card" style="width:100%">
  <div class="card-header" style="background-color: #0056b3; color: #ffffff;">
    <h2 class="mb-0">Version Info</h2>
  </div>
  <div class="card-body">
    <h5 class="card-title">Versions</h5>
    <h6 class="card-subtitle mb-2 text-muted">PHP: <?php echo phpversion(); ?></h6>
    <!-- <p class="card-text">PHP </p> -->
    <h6 class="card-subtitle mb-2 text-muted">Laravel: {{ app()->version() }}</h6>
      @if(isset($cntusers))
      <h6 class="card-subtitle mb-2 text-muted">Users: {{$cntusers}}</h6>
      @endif
    <!-- <p class="card-text">Laravel </p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a> -->


 @if (auth()->check())
@if (auth()->user()->hasRole('admin'))
    @foreach($usersWithRoles as $uinfo)
        @if ($uinfo->roles->contains('name', 'admin'))
            {{$uinfo->username}} [ {{ $uinfo->roles->pluck('name')->implode(', ') }} ] <br>
        @elseif ($uinfo->roles->contains('name', 'user'))
            {{$uinfo->username}} [ {{ $uinfo->roles->pluck('name')->implode(', ') }} ] <br>
        @endif
    @endforeach
@elseif (auth()->user()->hasRole('user'))
    User Data
@else
    Other Data
@endif

@endif




    @php
$numbersToPick = 5;
$minNumber = 1;
$maxNumber = 69;

$randomNumbers = [];
while (count($randomNumbers) < $numbersToPick) {
    $randomNumber = rand($minNumber, $maxNumber);
    if (!in_array($randomNumber, $randomNumbers)) {
        $randomNumbers[] = $randomNumber;
    }
}

sort($randomNumbers);
$finalNumber = rand(1, 25);
echo "<HR>Randomly picked PowerBall numbers: <br>" ;
echo '<div style="display: flex; flex-wrap: wrap;">';

foreach ($randomNumbers as $number) {
    echo '<div style="width: 50px; height: 50px; border-radius: 50%; background-color: white; display: flex; justify-content: center; align-items: center; margin: 5px; font-weight: bold; color: black;">' . $number . '</div>';
}
echo ' <div style="width: 50px; height: 50px; border-radius: 50%; background-color: #e97855; display: flex; justify-content: center; align-items: center; margin: 5px; font-weight: bold; color: black;">' . $finalNumber . '</div></div>';
    @endphp

  </div>
</div>

 </div>

{{--$usersWithRoles--}}


</div>
</div>

@endsection

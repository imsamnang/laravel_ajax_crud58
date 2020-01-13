@extends('print.print_layout')
@section('content')
  <center>
    <br><br>
    <a href="{{ url('/students/prnpriview') }}" class="btnprn btn">Print Preview</a>
  </center>
  <div id="printPreview">
    <center>
      <h1>Course List </h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">NIS</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody id="getdataTable">
          @foreach ($students as $res)
            <tr>
              <th scope="row">{{$res->id}}</th>
              <td><img src="{{asset('Upload/student/'.$res->photo)}}" alt="Photo" width="30" height="30"></td>
              <td>{{$res->nis}}</td>
              <td>{{$res->name}}</td>
              <td>{{$res->class}}</td>
              <td>
                <a href="" class="btn btn-warning btn-sm edit" id="{{$res->id}}" data-id="{{$res->id}}">Edit</a> 
                <a href="" class="btn btn-danger btn-sm delete" id="{{$res->id}}" data-id="{{$res->id}}">Del</a>
              </td>
            </tr>
          @endforeach          
        </tbody>
      </table>      
    </center>
    <div class="row">
      <div class="demo twelve columns">
        <h3>Kittens</h3>

        <img id="kitty-one" alt="cute kitten" src="{{asset('images/cat1.jpg')}}" />

        <p>Bathe self with tongue then lick owner's face kitten is playing with dead mouse and leave dead animals as gifts.
          Lies down . Ears back wide eyed then cats take over the world meowing non stop for food.</p>

        <img class="u-pull-left" id="kitty-two" alt="cute kitten" src="{{asset('images/cat2.jpg')}}"/>

        <p>Always hungry lick arm hair. Kitty loves pigs chase the pig around the house. Spend all night ensuring people don't
          sleep sleep all day play time.</p>

        <p>Licks paws sit and stare, and going to catch the red dot today going to catch the red dot today. Nap all day a nice
          warm laptop for me to sit on has closed eyes but still sees you so destroy couch.</p>

        <p>Hide at bottom of staircase to trip human cat not kitten around get video posted to internet for chasing red dot.</p>

        <p>Chase red laser dot flee in terror at cucumber discovered on floor play riveting piece on synthesizer keyboard meoooow!
          Attack the dog then pretend like nothing happened. Poop in litter box, scratch the walls eat and than sleep on
          your face wake up human for food at 4am.</p>

        <img class="u-pull-right" id="kitty-three" alt="cute kitten" src="{{asset('images/cat3.jpg')}}"/>

        <p>Chase red laser dot swat turds around the house shake treat bag thinking longingly about tuna brine. Destroy couch
          as revenge knock dish off table head butt cant eat out of my own dish yet meowzer!</p>

        <p>Destroy couch as revenge. Claw drapes lick the plastic bag swat turds around the house eat and than sleep on your
          face. Mark territory pelt around the house and up and down stairs chasing phantoms. Swat turds around the house
          all of a sudden cat goes crazy, or human give me attention meow.</p>
      </div>
    </div>    
  </div>
@endsection
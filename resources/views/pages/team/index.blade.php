@extends('layouts.guest')

@section('slider')
    @include('temp.breadcrumb')
@endsection

@section('content')
     <!-- Team Pyaler Section Start -->
     <div class="rs-team style2 pt-100 md-pt-80">
        <div class="container">
            <div class="row pb-100 md-pb-80">
                @if (!@$players->isEmpty())
                    @foreach ($players as $player)
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                        <div class="player-item">
                            <div class="player-img">
                                <a href="{{ route('team.player.show',$player->slug) }}"><img src="{{ asset('uploads/team_images/'.@$player->images->path??'') }}" alt=""></a>
                            </div>
                            <div class="detail-wrap">
                                <div class="person-details">
                                    <h3 class="player-title"><span class="squad-numbers">{{ @$player->position_number??'' }}</span>
                                        <a href="{{ route('team.player.show',$player->slug) }}">{{ ucWords(@$player->name??'') }}</a>
                                        <span class="player-position">{{ ucWords(@$player->position->name??'') }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="alert alert-info text-center col-12"><b>No team player Found!</b></div>
                @endif
                
            </div>

            <!-- Subscribe Section Start -->
            @include('temp.subscribe_section')
            <!-- Subscribe Section End -->
        </div>
    </div>
    <!-- Team Pyaler Section End -->
@endsection
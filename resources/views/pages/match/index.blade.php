@extends('layouts.guest')
@section('slider')
    @include('temp.breadcrumb')
@endsection
@section('extra-css')
    <style>
        .rs-tab .single-team-data .tab-content .tab-pane {
            background: #ffffff;
            padding: 10px;
        }
        .md-pt-80 {
            padding-top: 10px;
        }
        .md-pt-80 {
            padding-bottom: 10px;
        }
        /* @media only screen and (max-width: 991px){
            .md-pt-80 {
                padding-top: 10px;
            }
        } */

    </style>
@endsection
@section('content')
   
  <!-- Single Club Section Start -->
  <div class="rs-single-team sec-bg pt-100 md-pt-80 md-pb-80">
    <div class="container">

        <div class="rs-tab pb-100 md-pb-80">
            <div class="single-team-data">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#team-overview">Fixtures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#player-gallery">Results</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#player-videos">Table</a>
                    </li>
                </ul>
                <div class="tab-content">
                    {{-- FIXTURES STARTS --}}
                    <div class="tab-pane fade show active" id="team-overview">
                        <div class="rs-match-fixture style2 pt-100 md-pt-80">
                                <div class="match-list bg11 pt-57 pb-57 md-pt-27 md-pb-27 mb-100 md-mb-80">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="medium-font">Barcelona</td>
                                                <td class="short-width">VS</td>
                                                <td class="medium-font">Arsenal</td>
                                                <td>July 31 2019, 00:00</td>
                                                <td>Emirates Stadium</td>
                                            </tr>
                                            <tr>
                                                <td class="medium-font">Barcelona</td>
                                                <td class="short-width">VS</td>
                                                <td class="medium-font">Chelsea</td>
                                                <td>August 15 2019, 00:00</td>
                                                <td>Stamford Bridge</td>
                                            </tr>
                                            <tr>
                                                <td class="medium-font">Barcelona</td>
                                                <td class="short-width">VS</td>
                                                <td class="medium-font">Liverpool</td>
                                                <td>July 18 2019, 00:00</td>
                                                <td>Central Olympic Stadium</td>
                                            </tr>
                                            <tr>
                                                <td class="medium-font">Barcelona</td>
                                                <td class="short-width">VS</td>
                                                <td class="medium-font">Manchester Unt</td>
                                                <td>April 09 2019, 00:00</td>
                                                <td>Old Trafford Stadium</td>
                                            </tr>
                                            <tr>
                                                <td class="medium-font">Real Madrid</td>
                                                <td class="short-width">VS</td>
                                                <td class="medium-font">Chelsea</td>
                                                <td>April 09 2019, 00:00</td>
                                                <td>Santiago Bernabéu Stadium</td>
                                            </tr>
                                            <tr>
                                                <td class="medium-font">Manchester Unt</td>
                                                <td class="short-width">VS</td>
                                                <td class="medium-font">Real Sociedad</td>
                                                <td>May 09 2019, 00:00</td>
                                                <td>Real Anoeta Stadium</td>
                                            </tr>
                                            <tr>
                                                <td class="medium-font">Man City</td>
                                                <td class="short-width">VS</td>
                                                <td class="medium-font">Real Sociedad</td>
                                                <td>April 05 2019, 03:00</td>
                                                <td>Real Anoeta Stadium</td>
                                            </tr>
                                            <tr>
                                                <td class="medium-font">Man City</td>
                                                <td class="short-width">VS</td>
                                                <td class="medium-font">Arsenal</td>
                                                <td>April 04 2019, 03:00</td>
                                                <td>Etihad Stadium</td>
                                            </tr>
                                            <tr>
                                                <td class="medium-font">Man City</td>
                                                <td class="short-width">VS</td>
                                                <td class="medium-font">Liverpool</td>
                                                <td>April 07 2019, 03:00</td>
                                                <td>Etihad Stadium</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>

                    {{-- RESULTS STARTS --}}
                    <div class="tab-pane fade" id="player-gallery">
                        <div class="team-gallery">
                            <div class="rs-result inner pt-100 md-pt-80">
                                    <div class="result-info pb-100 md-pb-80">
                                        <table class="result-table">
                                            <tbody>
                                                <tr>
                                                    <td class="logo"><img class="size-60" src="images/team-logo/4.png" alt="">Real Madrid</td>
                                                    <td><span class="total-goal">2-1</span></td>
                                                    <td class="logo"><img class="size-60" src="images/team-logo/6.png" alt="">Atletico Madrid</td>
                                                    <td>April 04 2019</td>
                                                    <td><a href="#" class="readon">View Statictics</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="logo"><img class="size-60" src="images/team-logo/2.png" alt="">Real Sociedad</td>
                                                    <td><span class="total-goal">2-1</span></td>
                                                    <td class="logo"><img class="size-60" src="images/team-logo/1.png" alt="">Valencia</td>
                                                    <td>April 02 2019</td>
                                                    <td><a href="#" class="readon">View Statictics</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="logo"><img class="size-60" src="images/team-logo/4.png" alt="">Real Madrid</td>
                                                    <td><span class="total-goal">3-2</span></td>
                                                    <td class="logo"><img class="size-60" src="images/team-logo/9.png" alt="">Barcelona</td>
                                                    <td>April 01 2019</td>
                                                    <td><a href="#" class="readon">View Statictics</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>



                    {{-- TABLE STARTS --}}
                    <div class="tab-pane fade" id="player-videos">
                        <div class="club-videos">
                            <div class="rs-pointtable inner-style pt-100 md-pt-80 md-pb-80">
                                    <div class="point-table-wrap pb-100 md-pb-80">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th></th>
                                                    <th>Team</th>
                                                    <th>P</th>
                                                    <th>W</th>
                                                    <th>D</th>
                                                    <th>L</th>
                                                    <th>GS</th>
                                                    <th>GA</th>
                                                    <th>GD</th>
                                                    <th>PTS</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Manchester Unt</td>
                                                    <td>34</td>
                                                    <td>26</td>
                                                    <td>5</td>
                                                    <td>3</td>
                                                    <td>72</td>
                                                    <td>44</td>
                                                    <td>28</td>
                                                    <td>83</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Man City</td>
                                                    <td>45</td>
                                                    <td>18</td>
                                                    <td>7</td>
                                                    <td>5</td>
                                                    <td>86</td>
                                                    <td>21</td>
                                                    <td>32</td>
                                                    <td>48</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Liverpool</td>
                                                    <td>26</td>
                                                    <td>45</td>
                                                    <td>12</td>
                                                    <td>8</td>
                                                    <td>45</td>
                                                    <td>32</td>
                                                    <td>30</td>
                                                    <td>18</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Chelsea</td>
                                                    <td>25</td>
                                                    <td>19</td>
                                                    <td>30</td>
                                                    <td>50</td>
                                                    <td>89</td>
                                                    <td>65</td>
                                                    <td>20</td>
                                                    <td>18</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Arsenal</td>
                                                    <td>52</td>
                                                    <td>36</td>
                                                    <td>46</td>
                                                    <td>45</td>
                                                    <td>78</td>
                                                    <td>60</td>
                                                    <td>12</td>
                                                    <td>9</td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Barcelona</td>
                                                    <td>31</td>
                                                    <td>28</td>
                                                    <td>8</td>
                                                    <td>5</td>
                                                    <td>75</td>
                                                    <td>41</td>
                                                    <td>22</td>
                                                    <td>44</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribe Section Start -->
        @include('temp.subscribe_section')
        <!-- Subscribe Section End -->
    </div>
</div>
<!-- Single Club Section End -->
@endsection
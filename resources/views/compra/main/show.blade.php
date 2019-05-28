@extends('compra.index', ['title' => __('Escolha de Assentos')])

@section('infos')
<div class="card-header bg-default border-0">
        <div class="row align-cidades-center">
            <div class="col-lg-8">
                <h3 class="mb-0 text-white">{{ __('Alegrete') }} <i class="fas fa-arrow-right"> {{ __('Porto Alegre') }} </i> </h3>
            </div>
        </div>
    </div>
    <div class="card-body bg-white border-0">
        <ul class="list-group list-group-flush" data-toggle="checklist">
            <li class="checklist-entry list-group-item flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <div class="checklist-info">
                        <div class="col">
                            <h3 class="checklist-title">Viagem</h3>
                            <small class="ml-3">Alegrete <i class="fas fa-chevron-right"></i> Porto Alegre</small>
                        </div>
                    </div>
                    <div class="checklist-info">
                        <div class="col">
                            <h3 class="checklist-title">Saída e Chegada</h3>
                            <small class="ml-3"><i class="fas fa-clock"></i> 23:30 <i class="fas fa-chevron-right"></i> 08:30</small>
                        </div>
                    </div>
                </div>
            </li> 
            <li class="checklist-entry list-group-item flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <div class="checklist-info">
                        <div class="col">
                            <h3 class="checklist-title mb-0">PASSAGEM</h3>
                            <small class="ml-3"><i class="fas fa-money-bill-alt"></i>  R$ 233,50</small>
                        </div>
                    </div>
                    <div class="checklist-info">
                        <div class="col">
                            <h3 class="checklist-title mb-0">POLTRONA</h3>
                            <div class="row justify-content-center">
                                <button type="button" class="btn btn-primary btn-sm mb-3">06</button>
                            </div>
                        </div>
                    </div>
                    <div class="checklist-info">
                        <div class="col">
                            <span class="badge badge-primary mt-4">EXECUTIVO</span>
                        </div>
                    </div>
                </div>
            </li> 
            <li class="checklist-entry list-group-item flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <button type="button" class="btn btn-warning btn-sm">Alterar</button>
                    <h1 class="checklist-title mb-0">Total R$ 233,50</h1>                    
                </div>
            </li> 
        </ul>
    </div>
    
    <div class="card-footer bg-default border-0">
        <div class="row">
        </div>
    </div>
@endsection

@section('infos-poltrona')
<div class="bg-default card-header border-0">
  <div class="row align-cidades-center">
    <div class="col-8">
      <h3 class="mb-0 text-white">{{ __('Escolha sua(s) poltrona(s)') }}</h3>
    </div>
  </div>
</div>

<div class="card-body bg-white" style="padding-top: 0px;!important">
  <div class="row clearfix justify-content-center">
    <div class="plane col-6">
      <link type="text/css" href="{{ asset('argon') }}/css/seats.css" rel="stylesheet">
      <div class="cockpit">
        <h1>Selecione</h1>
      </div>
      <div class="exit exit--front fuselage">

      </div>
      <ol class="cabin fuselage">
        <li class="row row--1" style="margin: 0%;!important">
          <ol class="seats" type="A">
            <li class="seat">
              <input type="checkbox" id="P1" />
              <label for="P1">1</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="P2" />
            <label for="P2">2</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="P3" />
              <label for="P3">3</label>
            </li>
            <li class="seat">
              <input type="checkbox" id="P4" />
              <label for="P4">4</label>
            </li>
          </ol>
            </li>
            <li class="row row--2" style="margin: 0%;!important">
              <ol class="seats" type="A">
                <li class="seat">
                  <input type="checkbox" id="P5" />
                  <label for="P5">5</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P6" />
                  <label for="P6">6</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P7" />
                  <label for="P7">7</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P8" />
                  <label for="P8">8</label>
                </li>
              </ol>
            </li>
            <li class="row row--3" style="margin: 0%;!important">
              <ol class="seats" type="A">
                <li class="seat">
                  <input type="checkbox" id="P9" />
                  <label for="P9">9</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P10" />
                  <label for="P10">10</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P11" />
                  <label for="P11">11</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P12" />
                  <label for="P12">12</label>
                </li>
              </ol>
            </li>
            <li class="row row--4" style="margin: 0%;!important">
              <ol class="seats" type="A">
                <li class="seat">
                  <input type="checkbox" id="P13" />
                  <label for="P13">13</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P14" />
                  <label for="P14">14</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P15" />
                  <label for="P15">15</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P16" />
                  <label for="P16">16</label>
                </li>
              </ol>
            </li>
            <li class="row row--5" style="margin: 0%;!important">
              <ol class="seats" type="A">
                <li class="seat">
                  <input type="checkbox" id="P17" />
                  <label for="P17">17</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P18" />
                  <label for="P18">18</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P19" />
                  <label for="P19">19</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P20" />
                  <label for="P20">20</label>
                </li>
              </ol>
            </li>
            <li class="row row--6" style="margin: 0%;!important">
              <ol class="seats" type="A">
                <li class="seat">
                  <input type="checkbox" id="P21" />
                  <label for="P21">21</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P22" />
                  <label for="P22">22</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P23" />
                  <label for="P23">23</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P24" />
                  <label for="P24">24</label>
                </li>
              </ol>
            </li>
            <li class="row row--7" style="margin: 0%;!important">
              <ol class="seats" type="A">
                <li class="seat">
                  <input type="checkbox" id="P25" />
                  <label for="P25">25</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P26" />
                  <label for="P26">26</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P27" />
                  <label for="P27">27</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P28" />
                  <label for="P28">28</label>
                </li>
              </ol>
            </li>
            <li class="row row--8" style="margin: 0%;!important">
              <ol class="seats" type="A">
                <li class="seat">
                  <input type="checkbox" id="P29" />
                  <label for="P29">29</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P30" />
                  <label for="P30">30</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P31" />
                  <label for="P31">30</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P32" />
                  <label for="P32">32</label>
                </li>
              </ol>
            </li>
            <li class="row row--9" style="margin: 0%;!important">
              <ol class="seats" type="A">
                <li class="seat">
                  <input type="checkbox" id="P33" />
                  <label for="P33">33</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P34" />
                  <label for="P34">34</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P35" />
                  <label for="P35">35</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P36" />
                  <label for="P36">36</label>
                </li>
              </ol>
            </li>
            <li class="row row--10" style="margin: 0%;!important">
              <ol class="seats" type="A">
                <li class="seat">
                  <input type="checkbox" id="P37" />
                  <label for="P37">37</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P38" />
                  <label for="P38">38</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P39" />
                  <label for="P39">39</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P40" />
                  <label for="P40">40</label>
                </li>
              </ol>
            </li>
            <li class="row row--11" style="margin: 0%;!important">
              <ol class="seats" type="A">
                <li class="seat">
                  <input type="checkbox" id="P41" />
                  <label for="P41">41</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P42" />
                  <label for="P42">42</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P43" />
                  <label for="P43">43</label>
                </li>
                <li class="seat">
                  <input type="checkbox" id="P44" />
                  <label for="P44">44</label>
                </li>
              </ol>
            </li>
          </ol>

    </div>
  </div>
</div>
@endsection

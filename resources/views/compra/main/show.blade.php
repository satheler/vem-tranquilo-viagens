@extends('compra.index', ['title' => __('Escolha de Assentos')])

@section('infos')
<div class="plane">
        <style>
            *, *:before, *:after {
  box-sizing: border-box;
}

html {
  font-size: 16px;
}

.plane {
  margin: 20px auto;
  max-width: 300px;
}

.cockpit {
  height: 250px;
  position: relative;
  overflow: hidden;
  text-align: center;
  border-bottom: 5px solid #d8d8d8;
}
.cockpit:before {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  height: 500px;
  width: 100%;
  border-radius: 50%;
  border-right: 5px solid #d8d8d8;
  border-left: 5px solid #d8d8d8;
}
.cockpit h1 {
  width: 60%;
  margin: 100px auto 35px auto;
}

.exit {
  position: relative;
  height: 50px;
}
.exit:before, .exit:after {
  content: "EXIT";
  font-size: 14px;
  line-height: 18px;
  padding: 0px 2px;
  font-family: "Arial Narrow", Arial, sans-serif;
  display: block;
  position: absolute;
  background: green;
  color: white;
  top: 50%;
  transform: translate(0, -50%);
}
.exit:before {
  left: 0;
}
.exit:after {
  right: 0;
}

.fuselage {
  border-right: 5px solid #d8d8d8;
  border-left: 5px solid #d8d8d8;
}

ol {
  list-style: none;
  padding: 0;
  margin: 0;
}

.seats {
  display: contents;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: flex-start;
}

.seat {
  display: flex;
  flex: 0 0 14.28571428571429%;
  padding: 5px;
  position: relative;
}
.seat:nth-child(3) {
  margin-right: 14.28571428571429%;
}
.seat input[type=checkbox] {
  position: absolute;
  opacity: 0;
}
.seat input[type=checkbox]:checked + label {
  background: #bada55;
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
  animation-duration: 300ms;
  animation-fill-mode: both;
}
.seat input[type=checkbox]:disabled + label {
  background: #dddddd;
  text-indent: -9999px;
  overflow: hidden;
}
.seat input[type=checkbox]:disabled + label:after {
  content: "X";
  text-indent: 0;
  position: absolute;
  top: 4px;
  left: 50%;
  transform: translate(-50%, 0%);
}
.seat input[type=checkbox]:disabled + label:hover {
  box-shadow: none;
  cursor: not-allowed;
}
.seat label {
  display: block;
  position: relative;
  width: 100%;
  text-align: center;
  font-size: 14px;
  font-weight: bold;
  line-height: 1.5rem;
  padding: 4px 0;
  background: #F42536;
  border-radius: 5px;
  animation-duration: 300ms;
  animation-fill-mode: both;
}
.seat label:before {
  content: "";
  position: absolute;
  width: 75%;
  height: 75%;
  top: 1px;
  left: 50%;
  transform: translate(-50%, 0%);
  background: rgba(255, 255, 255, 0.4);
  border-radius: 3px;
}
.seat label:hover {
  cursor: pointer;
  box-shadow: 0 0 0px 2px #5C6AFF;
}

@-webkit-keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
.rubberBand {
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
}

        </style>
        <div class="cockpit">
          <h1>Please select a seat</h1>
        </div>
        <div class="exit exit--front fuselage">

        </div>
        <ol class="cabin fuselage">
          <li class="row row--1">
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
          <li class="row row--2">
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
          <li class="row row--3">
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
          <li class="row row--4">
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
          <li class="row row--5">
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
          <li class="row row--6">
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
          <li class="row row--7">
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
          <li class="row row--8">
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
          <li class="row row--9">
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
          <li class="row row--10">
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
          <li class="row row--11">
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
        <div class="exit exit--back fuselage">

        </div>
      </div>
@endsection

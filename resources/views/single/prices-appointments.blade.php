<div class="price-situation">
    <div class="titles">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-0">
                <div class="title">{{ __('Prices') }}</div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                <div class="title padding-left">{{ __('Situation')  }}</div>
            </div>
        </div>
    </div>
    <div class="parameters">
        <div class="row">
            <div class="parameters-block parameters-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="row">
                    <div class="title type col-xl-5 col-lg-5 col-md-5 col-sm-5">{{ __('Type') }}</div>
                    <div class="title quantity col-xl-2 col-lg-2 col-md-2 col-sm-2">{{ __('Amount') }}</div>
                    <div class="title personen col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">{{ __('Personen') }}</div>
                    <div class=" title price col-xl-3 col-lg-3 col-md-3 col-sm-3">{{ __('Price') }}</div>
                </div>
            </div>
            <div class="parameters-block parameters-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="row">
                    <div class="title type-bed col-xl-4 col-lg-4 col-md-4 col-sm-4">{{ __('Bed type') }}</div>
                    <div class="title shower col-xl-4 col-lg-4 col-md-4 col-sm-4">{{ __('Shower') }}</div>
                    <div class="title kitchen col-xl-4 col-lg-4 col-md-4 col-sm-4">{{ __('Kitchen') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="position">
        @foreach ($hotel->getRoomTypes() as $roomType)
        <div class="top-bloc-collapse" data-toggle="collapse" data-target="#position2-collapse" role="button" aria-expanded="false" aria-controls="position2-collapse">
            <div class="row">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" style="padding-right:2px !important;">
                    <div class="top-bloc-collapse-item top-bloc-collapse-left">
                        <div class="row" style="margin-right:-2px !important;">
                            <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                <img src="/svg/i-room-filled.svg" alt="house">
                                {{ __('apartment')}}
                            </div>
                            <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">{{ $hotel->getTotalRooms($roomType->id) }}x</div>
                            <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2">{{ $hotel->getRoomPersonsMax($roomType->id) }}</div>
                            <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                {{ __('of')  }} <span>{{ $hotel->getRoomPriceMin($roomType->id) }}€</span>/{{ __('person') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" style="padding-left:2px !important;">
                    <div class="top-bloc-collapse-item top-bloc-collapse-right">
                        <div class="row" style="height:100%;margin-left:-2px !important;">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center"></div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                <div class="shower-item-block shower-item-block-green">
                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                    </svg>
                                    {{ __('private') }}
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center bg">
                                <div class="kitchen-item-block kitchen-item-block-green">
                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                    </svg>
                                    {{ __('private') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($hotel->getRoomsByType($roomType->id) as $key => $room)
                @if ($room['price'] == 0)
                    @continue
                @endif
                <div class="collapse show" id="position2-collapse">
                    <div class="collapse-content-line">
                        <div class="row">
                            <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                        @if ($room['person'] == 1)
                                            <img src="/svg/i-one.svg" alt="alt">
                                        @elseif ($room['person'] == 2)
                                            <img src="/svg/i-two.svg" alt="alt">
                                        @else
                                            <img src="/svg/i-multi.svg" alt="alt">
                                        @endif
                                        <span>{{ App\Room::getName($room['person']) }}</span>
                                    </div>
                                    <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">{{$room['number']}}x</div>
                                    <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">{{$room['person']}}</div>
                                    <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3 col-sm-3">{{ __('of')  }} <span>{{ceil($room['price'])}}€</span>/{{ __('person') }}</div>
                                </div>
                            </div>
                            <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="row" style="height:100%;">
                                    <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="{{ App\Room::getBedroomLabelColor($room) }}"/>
                                            </svg>
                                            {{ App\Room::getBedroomTypeText($room) }}
                                        </div>
                                    </div>
                                    <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                        <div class="shower-item-block shower-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="{{ App\Room::getShowerLabelColor($room) }}"/>
                                            </svg>
                                            {{ App\Room::getShowerTypeText($room) }}
                                        </div>
                                    </div>
                                    <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                        <div class="kitchen-item-block kitchen-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="{{ App\Room::getKitchenLabelColor($room) }}"/>
                                            </svg>
                                            {{ App\Room::getKitchenTypeText($room) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>

    {{--
  <div class="position">
      <div class="top-bloc-collapse" data-toggle="collapse" data-target="#position3-collapse" role="button" aria-expanded="false" aria-controls="position3-collapse">
          <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                  <div class="top-bloc-collapse-item top-bloc-collapse-left">
                      <div class="row">
                          <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                              <img src="/svg/i-hotel-filled.svg" alt="house">
                              гостиница
                          </div>
                          <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">1x</div>
                          <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2">100+</div>
                          <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>18€</span>/person</div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                  <div class="top-bloc-collapse-item top-bloc-collapse-right">
                      <div class="row" style="height:100%;">
                          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center"></div>
                          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                              <div class="shower-item-block shower-item-block-green">
                                  <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                  </svg>
                                  свой
                              </div>
                          </div>
                          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center bg">
                              <div class="kitchen-item-block kitchen-item-block-green">
                                  <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                  </svg>
                                  своя
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="collapse show" id="position3-collapse">
              <div class="collapse-content-line">
                  <div class="row">
                      <div class="collapse-left-block col-xl-6 col-md-6 col-lg-6 col-sm-6 pr-1">
                          <div class="row">
                              <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                  <img src="/svg/i-one.svg" alt="alt">
                                  одноместный
                              </div>
                              <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">2x</div>
                              <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">1</div>
                              <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>25€</span>/person</div>
                          </div>
                      </div>
                      <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                          <div class="row" style="height:100%;">
                              <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="type-bed-item-block type-bed-item-block-green">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                      </svg>
                                      одноместная
                                  </div>
                              </div>
                              <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="shower-item-block shower-item-block-orange">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                      </svg>
                                      совместный
                                  </div>
                              </div>
                              <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="kitchen-item-block kitchen-item-block-orange">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                      </svg>
                                      совместная
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="collapse-content-line">
                  <div class="row">
                      <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                          <div class="row">
                              <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                  <img src="/svg/i-two.svg" alt="alt">
                                  двухместный
                              </div>
                              <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">3x</div>
                              <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">2</div>
                              <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>22€</span>/person</div>
                          </div>
                      </div>
                      <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                          <div class="row" style="height:100%;">
                              <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="type-bed-item-block type-bed-item-block-green">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                      </svg>
                                      одноместная
                                  </div>
                              </div>
                              <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="shower-item-block shower-item-block-orange">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                      </svg>
                                      совместный
                                  </div>
                              </div>
                              <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="kitchen-item-block kitchen-item-block-orange">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                      </svg>
                                      совместная
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="collapse-content-line">
                  <div class="row">
                      <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                          <div class="row">
                              <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                  <img src="/svg/i-multi.svg" alt="alt">
                                  трехместный
                              </div>
                              <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">5x</div>
                              <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">3</div>
                              <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>20€</span>/person</div>
                          </div>
                      </div>
                      <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                          <div class="row" style="height:100%;">
                              <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="type-bed-item-block type-bed-item-block-green">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                      </svg>
                                      одноместная
                                  </div>
                              </div>
                              <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="shower-item-block shower-item-block-orange">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                      </svg>
                                      совместный
                                  </div>
                              </div>
                              <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="kitchen-item-block kitchen-item-block-orange">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                      </svg>
                                      совместная
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="collapse-content-line">
                  <div class="row">
                      <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                          <div class="row">
                              <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                  <img src="/svg/i-multi.svg" alt="alt">
                                  четырехместный
                              </div>
                              <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">1x</div>
                              <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">4</div>
                              <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>18€</span>/person</div>
                          </div>
                      </div>
                      <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                          <div class="row" style="height:100%;">
                              <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="type-bed-item-block type-bed-item-block-green">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                      </svg>
                                      одноместная
                                  </div>
                              </div>
                              <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="shower-item-block shower-item-block-orange">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                      </svg>
                                      совместный
                                  </div>
                              </div>
                              <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                  <div class="kitchen-item-block kitchen-item-block-orange">
                                      <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                      </svg>
                                      совместная
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>--}}

    <div class="bottom-text">
        * {{ __('The text of the comment to the table with prices. The offers on your request are over, increase the distance or contact the manager directly') }}
    </div>
</div>

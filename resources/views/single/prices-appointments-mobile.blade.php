<div class="mobile-price-situation">
    <h2>{{ __('Prices and furnishings') }}</h2>
    <div>
        @foreach ($hotel->getRoomTypes() as $key => $roomType)
            <div class="position-collapse">
                <div class="visible-part" type="button" data-toggle="collapse" data-target="#position-collapse-{{ $key }}" aria-expanded="false" aria-controls="position-collapse">
                    <div class="top-part">
                        <div class="name">
                            <img src="/svg/i-room-filled.svg" alt="house">
                            {{ __('apartment')}}
                        </div>
                        <div class="price">
                            {{ __('of')  }} <span>{{ $hotel->getRoomPriceMin($roomType->id) }}€</span>/{{ __('person') }}
                        </div>
                        <div class="collapse-button"></div>
                    </div>
                    <div class="position-line">
                        <div class="position-line-title">{{ __('Amount')}}</div>
                        <div class="position-line-details">{{ $hotel->getTotalRooms($roomType->id) }}x</div>
                        <div class="empty-block"></div>
                    </div>
                    <div class="position-line">
                        <div class="position-line-title">{{ __('person') }}</div>
                        <div class="position-line-details">{{ $hotel->getRoomPersonsMax($roomType->id) }}</div>
                        <div class="empty-block"></div>
                    </div>
                </div>
                <div>
                    @foreach ($hotel->getRoomsByType($roomType->id) as $key2 => $room)
                        @if ($room['price'] == 0)
                            @continue
                        @endif
                        <div class="collapse position-content" id="position-collapse-{{ $key2 }}">
                            {{-- <div class="bg-color">
                                 <div class="position-line">
                                     <div class="position-line-title">Душ</div>
                                     <div class="position-line-details">
                                         <div class="small-green-block line-details-color">
                                             <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                             </svg>
                                             свой
                                         </div>
                                     </div>
                                     <div class="empty-block"></div>
                                 </div>
                                 <div class="position-line">
                                     <div class="position-line-title">Кухня</div>
                                     <div class="position-line-details">
                                         <div class="small-green-block line-details-color">
                                             <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                             </svg>
                                             своя
                                         </div>
                                     </div>
                                     <div class="empty-block"></div>
                                 </div>
                             </div>
                             --}}
                            <div class="position">
                                <div class="top-part">
                                    <div class="name">
                                        @if ($room['person'] == 1)
                                            <img src="/svg/i-one.svg" alt="alt">
                                        @elseif ($room['person'] == 2)
                                            <img src="/svg/i-two.svg" alt="alt">
                                        @else
                                            <img src="/svg/i-multi.svg" alt="alt">
                                        @endif
                                        <span>{{ App\Room::getName($room['person']) }}</span>
                                    </div>
                                    <div class="price">
                                        {{ __('of')  }} <span>{{ceil($room['price'])}}€</span>/{{ __('person') }}
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">{{ __('Amount') }}</div>
                                    <div class="position-line-details">{{$room['number']}}x</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">{{ __('person') }}</div>
                                    <div class="position-line-details">{{$room['person']}}</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">{{ __('Bed type') }}</div>
                                    <div class="position-line-details">
                                        <div class="big-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="{{ App\Room::getBedroomLabelColor($room) }}"/>
                                            </svg>
                                            {{ App\Room::getBedroomTypeText($room) }}
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">{{ __('Shower') }}</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="{{ App\Room::getShowerLabelColor($room) }}"/>
                                            </svg>
                                            {{ App\Room::getShowerTypeText($room) }}
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">{{ __('Kitchen') }}</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="{{ App\Room::getKitchenLabelColor($room) }}"/>
                                            </svg>
                                            {{ App\Room::getKitchenTypeText($room) }}
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <div class="bottom-text">
        * {{ __('The text of the comment to the table with prices. The offers on your request are over, increase the distance or contact the manager directly') }}
    </div>

</div>

<template>
    <section class="accommodation-facility-section">
        <div class="title">
            {{ $t('Accommodation data') }}
            <a href="#">{{  $t('Change') }}</a>
        </div>
        <div class="accommodation-facility-table">
            <div class="head-table">
                <div>{{ $t('type') }}</div>
                <div>{{ $t('Num') }}</div>
                <div>{{ $t('persone') }}</div>
                <div>{{ $t('Price') }}</div>
            </div>

            <div v-for="propertyItem in property.propertyTypes" class="table-block">
                <div class="table-line table-head-line">
                    <div>
                        <img src="/svg/i-house-filled.svg" alt="">
                        {{ $t('House') }}
                    </div>
                    <div>1x</div>
                    <div>10+</div>
                    <div><span>{{ $t('from')}}</span>18€</div>
                </div>
                <div class="table-line table-body-line">
                    <div>
                        <svg class="line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                        </svg>
                        <img src="/svg/i-one.svg" alt="">
                        {{ $t('Single') }}
                    </div>
                    <div>2x</div>
                    <div>1</div>
                    <div><span>{{ $t('from')}}</span>22€</div>
                </div>
                <div class="table-line table-body-line">
                    <div>
                        <svg class="line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                        </svg>
                        <img src="/svg/i-two.svg" alt="">
                        {{ $t('Double') }}
                    </div>
                    <div>3x</div>
                    <div>3</div>
                    <div>{{ $t('from')}}20€</div>
                </div>
                <div class="table-line table-body-line">
                    <div>
                        <svg class="line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                        </svg>
                        <img src="/svg/i-multi.svg" alt="">
                        {{ $t('Multi-seat') }}
                    </div>
                    <div>5x</div>
                    <div>4</div>
                    <div>{{ $t('from')}}18€</div>
                </div>
            </div>

            <div class="table-block">
                <div class="table-line table-head-line">
                    <div>
                        <img src="/svg/i-room-filled.svg" alt="">
                        {{ $t('apartment') }}
                    </div>
                    <div>1x</div>
                    <div>10+</div>
                    <div><span>{{ $t('from')}}</span>20€</div>
                </div>
                <div class="table-line table-body-line">
                    <div>
                        <svg class="line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                        </svg>
                        <img src="/svg/i-two.svg" alt="">
                        {{ $t('Double') }}
                    </div>
                    <div>2x</div>
                    <div>5</div>
                    <div><span>{{ $t('from')}}</span>22€</div>
                </div>
                <div class="table-line table-body-line">
                    <div>
                        <svg class="line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                        </svg>
                        <img src="/svg/i-multi.svg" alt="">
                        {{ $t('Triple') }}
                    </div>
                    <div>3x</div>
                    <div>3</div>
                    <div>{{ $t('from')}}20€</div>
                </div>
            </div>

            <div class="table-block">
                <div class="table-line table-head-line">
                    <div>
                        <img src="/svg/i-hotel-filled.svg" alt="">
                        {{ $t('Hotel') }}
                    </div>
                    <div>1x</div>
                    <div>10+</div>
                    <div><span>{{ $t('from')}}</span>18€</div>
                </div>
                <div class="table-line table-body-line">
                    <div>
                        <svg class="line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                        </svg>
                        <img src="/svg/i-one.svg" alt="">
                        {{ $t('Single') }}
                    </div>
                    <div>2x</div>
                    <div>1</div>
                    <div><span>{{ $t('from')}}</span>25€</div>
                </div>
                <div class="table-line table-body-line">
                    <div>
                        <svg class="line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                        </svg>
                        <img src="/svg/i-two.svg" alt="">
                        {{ $t('Double') }}
                    </div>
                    <div>3x</div>
                    <div>2</div>
                    <div>{{ $t('from')}}22€</div>
                </div>
                <div class="table-line table-body-line">
                    <div>
                        <svg class="line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                        </svg>
                        <img src="/svg/i-multi.svg" alt="">
                        {{ $t('Triple') }}
                    </div>
                    <div>5x</div>
                    <div>3</div>
                    <div>{{ $t('from')}}20€</div>
                </div>
                <div class="table-line table-body-line">
                    <div>
                        <svg class="line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                        </svg>
                        <img src="/svg/i-multi.svg" alt="">
                        {{ $t('Quadruple') }}
                    </div>
                    <div>1x</div>
                    <div>4</div>
                    <div>{{ $t('from')}}18€</div>
                </div>
            </div>

        </div>
    </section>

</template>

<script>
export default {
    name: "PropertyDataSummary",
    props: ['property']
}
</script>

<style scoped>

</style>

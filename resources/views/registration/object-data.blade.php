<section class="object-data-section">
    <div class="title">Данные об объекте</div>
    <div class="object-data-table">
        <div class="table-head">
            <div class="type-head table-head-item">Тип</div>
            <div class="quality-head table-head-item">Кол-во</div>
            <div class="personen-head table-head-item">Personen</div>
            <div class="price-head table-head-item">Цена/ чел</div>
            <div class="links-head"></div>
        </div>
        <div class="object-data-table-content selected-object">

            <div class="object-data-table-type object-data-table-line">
                <div class="select-type object-data-select">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path d="M1.50098 5.5V13.5H13.001V5.5L7.00098 0.5L1.50098 5.5Z" fill="#DDE4EB"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.34244 0.129383L13.1758 5.29357C13.2863 5.39121 13.3494 5.53154 13.3494 5.67892V13.4853C13.3494 13.7696 13.119 14 12.8347 14H1.16804C0.883745 14 0.65332 13.7696 0.65332 13.4853V5.67892C0.65332 5.53154 0.716456 5.39119 0.826788 5.29357L6.66011 0.129383C6.85485 -0.0432097 7.1477 -0.0430457 7.34244 0.129383ZM9.24997 12.9706H12.32V5.91072L7.00135 1.20219L1.68276 5.91072V12.9706H4.75489V8.93855C4.75489 8.65425 4.98528 8.42383 5.26958 8.42383H8.73525C9.01955 8.42383 9.24995 8.65425 9.24997 8.93855V12.9706ZM8.2204 12.9706V9.45324H5.78429V12.9706H8.2204Z" fill="#7A8793"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="14" height="14" fill="white" transform="translate(0.000976562)"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                        <select name="select-type-item" id="select-type-item" data-select2-id="select-type-item" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                            <option value="0" selected>Выберите тип</option>
                            <option value="1">Квартира</option>
                            <option value="2">Дом (целиком)</option>
                            <option value="3">Пансионат</option>
                            <option value="4">Гостевой дом</option>
                            <option value="5">Хостел</option>
                            <option value="6">Отель</option>
                        </select>
                </div>
                <div class="quality-input-block">
                    <div class="quality-head-mobile table-head-item table-head-item-mobile">Кол-во</div>
                    <input type="text" value="" name="quality-input" id="quality-input" placeholder="0">
                </div>
                <div class="personen-input-block">
                    <div class="personen-head-mobile table-head-item table-head-item-mobile">Personen</div>
                    <input type="text" value="" name="personen-input" id="personen-input" placeholder="0">
                </div>
                <div class="price-input-block">
                    <div class="price-head-mobile table-head-item table-head-item-mobile">Цена/ Чел</div>
                    <span class="from">от</span>
                    <input type="text" value="" name="price-input" id="price-input" placeholder="0">
                    <span class="dollar-sign">€</span>
                </div>
                <div class="object-data-link">
                    <a href="#" class="duplicate duplicate-desctope">Дублировать</a>
                    <a href="#" class="duplicate duplicate-mobile">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.4 4.4V13.6H12.6V4.4H5.4ZM5 3C4.44772 3 4 3.44772 4 4V14C4 14.5523 4.44772 15 5 15H13C13.5523 15 14 14.5523 14 14V4C14 3.44772 13.5523 3 13 3H5Z" fill="#9496A4"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.9998 1.70005C2.83412 1.70005 2.6998 1.83436 2.6998 2.00005V11C2.6998 11.3866 2.3864 11.7 1.9998 11.7C1.61321 11.7 1.2998 11.3866 1.2998 11V2.00005C1.2998 1.06117 2.06092 0.300049 2.9998 0.300049H9.9998C10.3864 0.300049 10.6998 0.613449 10.6998 1.00005C10.6998 1.38665 10.3864 1.70005 9.9998 1.70005H2.9998Z" fill="#9496A4"/>
                        </svg>
                    </a>
                    <a href="#" class="delete delete-desctope not-active">Удалить</a>
                    <a href="#" class="delete delete-mobile not-active">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.19497 3.20503C3.92161 2.93166 3.47839 2.93166 3.20503 3.20503C2.93166 3.47839 2.93166 3.92161 3.20503 4.19497L7.21025 8.2002L3.20542 12.205C2.93205 12.4784 2.93205 12.9216 3.20542 13.195C3.47878 13.4683 3.922 13.4683 4.19537 13.195L8.2002 9.19015L12.205 13.195C12.4784 13.4683 12.9216 13.4683 13.195 13.195C13.4683 12.9216 13.4683 12.4784 13.195 12.205L9.19015 8.2002L13.1954 4.19497C13.4687 3.92161 13.4687 3.47839 13.1954 3.20503C12.922 2.93166 12.4788 2.93166 12.2054 3.20503L8.2002 7.21025L4.19497 3.20503Z" fill="#9496A4"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="object-data-table-room object-data-table-line">
                <div class="select-room object-data-select">
                    <svg class="desctope-line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                    </svg>
                    <svg class="mobile-line" width="10" height="223" viewBox="0 0 10 223" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223861 1 0.500004V221.5C1 221.776 1.22386 222 1.5 222H9.5C9.77614 222 10 222.224 10 222.5C10 222.776 9.77614 223 9.5 223H1.5C0.671573 223 0 222.328 0 221.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                    </svg>

                    <select name="select-type-item" id="select-type-room">
                            <option value="0" selected>Выберите номер</option>
                            <option value="1">Однометсный</option>
                            <option value="2">Двухместный</option>
                            <option value="3">Трехместный</option>
                            <option value="4">Четырехместный</option>
                            <option value="5">Пятиместный</option>
                            <option value="6">Многоместный</option>
                        </select>
                </div>
                <div class="quality-input-block">
                    <div class="quality-head-mobile table-head-item table-head-item-mobile">Кол-во</div>
                    <input type="text" value="" name="quality-input" id="quality-input" placeholder="0">
                </div>
                <div class="personen-input-block">
                    <div class="personen-head-mobile table-head-item table-head-item-mobile">Personen</div>
                    <input type="text" value="" name="personen-input" id="personen-input" placeholder="0">
                </div>
                <div class="price-input-block">
                    <div class="price-head-mobile table-head-item table-head-item-mobile">Цена/ Чел</div>
                    <span class="from">от</span>
                    <input type="text" value="" name="price-input" id="price-input" placeholder="0">
                    <span class="dollar-sign">€</span>
                </div>
                <div class="object-data-link">
                    <a href="#" class="duplicate duplicate-desctope">Дублировать</a>
                    <a href="#" class="duplicate duplicate-mobile">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.4 4.4V13.6H12.6V4.4H5.4ZM5 3C4.44772 3 4 3.44772 4 4V14C4 14.5523 4.44772 15 5 15H13C13.5523 15 14 14.5523 14 14V4C14 3.44772 13.5523 3 13 3H5Z" fill="#9496A4"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.9998 1.70005C2.83412 1.70005 2.6998 1.83436 2.6998 2.00005V11C2.6998 11.3866 2.3864 11.7 1.9998 11.7C1.61321 11.7 1.2998 11.3866 1.2998 11V2.00005C1.2998 1.06117 2.06092 0.300049 2.9998 0.300049H9.9998C10.3864 0.300049 10.6998 0.613449 10.6998 1.00005C10.6998 1.38665 10.3864 1.70005 9.9998 1.70005H2.9998Z" fill="#9496A4"/>
                        </svg>
                    </a>
                    <a href="#" class="delete delete-desctope">Удалить</a>
                    <a href="#" class="delete delete-mobile">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.19497 3.20503C3.92161 2.93166 3.47839 2.93166 3.20503 3.20503C2.93166 3.47839 2.93166 3.92161 3.20503 4.19497L7.21025 8.2002L3.20542 12.205C2.93205 12.4784 2.93205 12.9216 3.20542 13.195C3.47878 13.4683 3.922 13.4683 4.19537 13.195L8.2002 9.19015L12.205 13.195C12.4784 13.4683 12.9216 13.4683 13.195 13.195C13.4683 12.9216 13.4683 12.4784 13.195 12.205L9.19015 8.2002L13.1954 4.19497C13.4687 3.92161 13.4687 3.47839 13.1954 3.20503C12.922 2.93166 12.4788 2.93166 12.2054 3.20503L8.2002 7.21025L4.19497 3.20503Z" fill="#9496A4"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="add-room object-data-table-line">
                <svg class="desctope-line" width="10" height="32" viewBox="0 0 10 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V30.5C1 30.7761 1.22386 31 1.5 31H9.5C9.77614 31 10 31.2239 10 31.5C10 31.7761 9.77614 32 9.5 32H1.5C0.671573 32 0 31.3284 0 30.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                </svg>
                <svg class="mobile-line" width="10" height="218" viewBox="0 0 10 218" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223859 1 0.500001V216.5C1 216.776 1.22386 217 1.5 217H9.5C9.77614 217 10 217.224 10 217.5C10 217.776 9.77614 218 9.5 218H1.5C0.671573 218 0 217.328 0 216.5V0.500001C0 0.223859 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                </svg>

                <a href="#">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.61407 0.614029C5.61407 0.27491 5.33916 0 5.00004 0C4.66092 0 4.38601 0.27491 4.38601 0.614029V4.38592H0.61403C0.274911 4.38592 1.48229e-08 4.66083 0 4.99995C-1.48229e-08 5.33907 0.274911 5.61398 0.61403 5.61398H4.38601V9.38587C4.38601 9.72499 4.66092 9.9999 5.00004 9.9999C5.33916 9.9999 5.61407 9.72499 5.61407 9.38587V5.61398H9.38587C9.72499 5.61398 9.9999 5.33907 9.9999 4.99995C9.9999 4.66083 9.72499 4.38592 9.38587 4.38592H5.61407V0.614029Z" fill="#545769"/>
                    </svg>
                    Добавить комнату
                </a>
            </div>

        </div>

        <div class="object-data-table-content unselected-object">

            <div class="add-object object-data-table-line">
                <a href="#">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.61407 0.614029C5.61407 0.27491 5.33916 0 5.00004 0C4.66092 0 4.38601 0.27491 4.38601 0.614029V4.38592H0.61403C0.274911 4.38592 1.48229e-08 4.66083 0 4.99995C-1.48229e-08 5.33907 0.274911 5.61398 0.61403 5.61398H4.38601V9.38587C4.38601 9.72499 4.66092 9.9999 5.00004 9.9999C5.33916 9.9999 5.61407 9.72499 5.61407 9.38587V5.61398H9.38587C9.72499 5.61398 9.9999 5.33907 9.9999 4.99995C9.9999 4.66083 9.72499 4.38592 9.38587 4.38592H5.61407V0.614029Z" fill="#545769"/>
                    </svg>
                    Добавить объект
                </a>
            </div>

            <div class="add-room object-data-table-line">
                <svg class="desctope-line" width="10" height="29" viewBox="0 0 10 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V27.5C1 27.7761 1.22386 28 1.5 28C1.77614 28 9.5 28 9.5 28C9.77614 28 10 28.2239 10 28.5C10 28.7761 9.77614 29 9.5 29C9.5 29 2.32843 29 1.5 29C0.671573 29 0 28.3284 0 27.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                </svg>
                <a href="#">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.61407 0.614029C5.61407 0.27491 5.33916 0 5.00004 0C4.66092 0 4.38601 0.27491 4.38601 0.614029V4.38592H0.61403C0.274911 4.38592 1.48229e-08 4.66083 0 4.99995C-1.48229e-08 5.33907 0.274911 5.61398 0.61403 5.61398H4.38601V9.38587C4.38601 9.72499 4.66092 9.9999 5.00004 9.9999C5.33916 9.9999 5.61407 9.72499 5.61407 9.38587V5.61398H9.38587C9.72499 5.61398 9.9999 5.33907 9.9999 4.99995C9.9999 4.66083 9.72499 4.38592 9.38587 4.38592H5.61407V0.614029Z" fill="#545769"/>
                    </svg>
                    Добавить комнату
                </a>
            </div>

        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        jQuery('#select-type-item, #select-type-room').select2();

    });
</script>

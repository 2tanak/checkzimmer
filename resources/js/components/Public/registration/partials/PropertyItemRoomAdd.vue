<template>
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
            {{ $t('Add room (register)') }}
        </a>
    </div>
</template>

<script>
export default {
    name: "PropertyItemRoomAdd"
}
</script>

<style lang="scss">

.registration-section {
    .object-data-table {
        .add-room {
            a {
                svg {
                    margin-right: 5px;
                    transition: all 0.2s;
                }
                &:hover {
                    svg {
                        path {
                            fill: #3B8B3E;
                        }
                    }
                    color: #3B8B3E;
                }
                font-weight: 400;
                font-size: 12px;
                line-height: 300%;
                color: #333646;
                outline: none;
                text-decoration: none;
                display: flex;
                align-items: center;
                margin-left: 37px;
                transition: all 0.2s;
            }
            position: relative;
        }
        .add-room > svg {
            position: absolute;
            left: 16px;
            top: -13px;
        }
        .object-data-table-line {
            border-bottom: 1px solid #edeef0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .selected-object {
            svg.mobile-line {
                display: none;
            }
        }
    }
}

@media (max-width: 760px) {
    .registration-section {
        .object-data-table {
            .add-room {
                a {
                    margin-left: 42px;
                }
            }
            .add-room > svg {
                left: 22px;
            }
        }
    }
}
@media (max-width: 479px) {
    .registration-section {
        .object-data-table {
            .object-data-table-line {
                &:first-of-type {
                    border-top: 1px solid #edeef0;
                }
                &:last-of-type {
                    border-bottom: 0;
                }
                flex-direction: column;
                align-items: flex-start;
            }
            .selected-object {
                .select-room {
                    svg.mobile-line {
                        display: block;
                        position: absolute;
                        top: -208px;
                        left: 6px;
                    }
                }
                .add-room {
                    svg.mobile-line {
                        display: block;
                        position: absolute;
                        top: -200px;
                        left: 22px;
                    }
                    padding: 0 !important;
                }
                svg.desctope-line {
                    display: none;
                }
            }
        }
    }
}

</style>

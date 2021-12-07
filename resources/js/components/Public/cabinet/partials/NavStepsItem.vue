<template>
    <div :class="{ 'steps-item-block': true, 'completed': step < activeStep, 'in-work': step === activeStep }">
       
        <div class="name-step">{{ title }}</div>
    </div>
</template>

<script>
export default {
    name: "RegistrationStepsItem",
    props: [ 'step', 'activeStep', 'title' ]
}
</script>

<style lang="scss">

.steps-section {
    .steps-item-block {
        &:last-of-type {
            margin-right: 0;
        }
        display: flex;
        align-items: center;
        margin-right: 45px;
    }
    .number-step {
        background: #B5B7C1;
        min-width: 44px;
        max-width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Roboto";
        font-weight: 500;
        font-size: 22px;
        line-height: 26px;
        color: #FFFFFF;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
        margin-right: 16px;
        border-radius: 50%;
        position: relative;
    }
    .name-step {
        font-weight: 600;
        font-size: 18px;
        line-height: 130%;
        color: #B5B7C1;
    }
    .step-check {
        display: none;
        position: absolute;
        top: -7px;
        right: -6px;
    }
    .steps-item-block.in-work {
        .number-step {
            &::before {
                min-width: 62px;
                max-width: 62px;
                height: 62px;
                border-radius: 50%;
                opacity: 0.4;
                border: 2px solid #6BB63F;
                content: "";
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            background: #6BB63F;
            position: relative;
        }
        .name-step {
            color: #3B8B3E;
        }
    }
    .steps-item-block.completed {
        .number-step {
            background: #545769;
        }
        .name-step {
            color: #333646;
        }
        .step-check {
            display: block;
        }
    }
}

@media (max-width: 1040px) {
    .steps-section {
        .steps-item-block {
            &:first-of-type {
                .name-step {
                    left: 0;
                    transform: none;
                    text-align: left;
                }
            }
            &:last-of-type {
                .name-step {
                    right: 0;
                    left: auto;
                    transform: none;
                    text-align: right;
                }
            }
            flex-direction: column;
            position: relative;
            margin-right: 0;
        }
        .number-step {
            margin-right: 0;
            min-width: 40px;
            max-width: 40px;
            height: 40px;
            font-size: 20px;
            line-height: 23px;
        }
        .name-step {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -52px;
            text-align: center;
            font-size: 16px;
        }
        .steps-item-block.in-work {
            .number-step {
                &::before {
                    min-width: 56px;
                    max-width: 56px;
                    height: 56px;
                }
            }
        }
        .step-check {
            width: 18px;
            height: 18px;
        }
    }
}
@media (max-width: 575px) {
    .steps-section {
        .number-step {
            min-width: 34px;
            max-width: 34px;
            height: 34px;
            font-size: 16px;
            line-height: 19px;
        }
        .steps-item-block.in-work {
            .name-step {
                &::before {
                    min-width: 44px;
                    max-width: 44px;
                    height: 44px;
                }
                display: block;
            }
        }
        .name-step {
            font-size: 14px;
            bottom: -28px;
            display: none;
        }
    }
}

</style>

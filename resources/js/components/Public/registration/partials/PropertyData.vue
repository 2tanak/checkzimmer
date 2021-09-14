<template>
    <section class="object-data-section">
        <div class="title">{{ $t('Object data') }}</div>
        <div class="object-data-table">
            <div class="table-head">
                <div class="type-head table-head-item">{{ $t('type (register)') }}</div>
                <div class="quality-head table-head-item">{{ $t('QTY') }}</div>
                <div class="personen-head table-head-item">{{ $t('Personen') }}</div>
                <div class="price-head table-head-item">{{ $t('PRICE / PERSON') }}</div>
                <div class="links-head"></div>
            </div>
            <PropertyItem v-for="(propertyItem, key) in property.propertyTypes" :index="key" :roomTypes="roomTypes"
                          :property="propertyItem" v-model="property.propertyTypes[key]"
                          :key="'prop' + JSON.stringify(propertyItem.name) + key"
                          @deleteType="deleteType" @duplicateType="duplicateType"
                          @addRoom="addRoom" @deleteRoom="deleteRoom" @duplicateRoom="duplicateRoom" />

            <div class="object-data-table-content unselected-object">

                <PropertyItemTypeAdd @click.native="propertyTypeAdd"/>

                <!--<PropertyItemRoomAdd/>-->
            </div>

        </div>
    </section>
</template>

<script>
import PropertyItem from "./PropertyItem";
import PropertyItemRoomAdd from "./PropertyItemRoomAdd";
import ApiRequest from "../../../API/ApiRequest";
import PropertyItemTypeAdd from "./PropertyItemTypeAdd";

let roomTypesRequest = ApiRequest('room-types');
let roomTypes = new roomTypesRequest;

export default {
    name: "PropertyData",
    components: {PropertyItemTypeAdd, PropertyItemRoomAdd, PropertyItem},
    props: ['property'],
    data() {
        return {
            roomTypes: []
        }
    },
    mounted() {
        roomTypes.all()
            .then(resp => {
                this.roomTypes = resp.data;
            })
    },
    methods: {
        propertyTypeAdd() {
            let property = { ...this.property };
            property.propertyTypes.push({ name: '', num: 0, persons: 1, price: 0, rooms: []});
        },
        deleteType(index) {
            let property = { ...this.property };
            property.propertyTypes.splice(index, 1);
            this.$emit('input', property);
        },
        duplicateType(index) {
            let property = { ...this.property };
            let propertyNew = JSON.parse(JSON.stringify(this.property.propertyTypes[index]));
            property.propertyTypes.push(propertyNew);
            this.$emit('input', property);
        },
        addRoom(index) {
            let property = { ...this.property };
            property.propertyTypes[index].rooms.push({
                name: '',
                num: 0,
                persons: 1,
                price: 0})
            this.$emit('input', property);
        },
        deleteRoom(data) {
            let property = { ...this.property };
            property.propertyTypes[data.index].rooms.splice(data.room, 1);
            this.$emit('input', property);
        },
        duplicateRoom(data) {
            let property = { ...this.property };
            let newRoom = JSON.parse(JSON.stringify(property.propertyTypes[data.index].rooms[data.room])) //{ ... }
            property.propertyTypes[data.index].rooms.splice(data.room+1, 0, newRoom);
            this.$emit('input', property);
        }
    }
}
</script>

<style lang="scss">

.registration-section {
    .object-data-section {
        &::after {
            position: absolute;
            content: "";
            max-width: 720px;
            width: 100%;
            height: 110px;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            background: #FFFFFF;
            box-shadow: 0 4px 30px rgb(51 54 70 / 16%);
            border-radius: 14px;
            z-index: -1;
        }
        background: #FFFFFF;
        box-shadow: 0 0 14px rgb(51 54 70 / 14%);
        border-radius: 12px;
        padding: 30px 16px;
        margin-bottom: 20px;
        max-width: 800px;
        width: 100%;
        position: relative;
    }
    .title {
        a {
            font-weight: 500;
            font-size: 14px;
            line-height: 100%;
            color: #3B8B3E;
            text-decoration: none;
        }
        margin-bottom: 16px;
        font-weight: 600;
        font-size: 20px;
        line-height: 130%;
        color: #333646;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .object-data-table {
        .table-head {
            .type-head {
                width: 145px;
                margin-left: 31px;
            }
            .quality-head {
                width: 50px;
            }
            .personen-head {
                width: 75px;
            }
            .price-head {
                width: 90px;
            }
            .links-head {
                width: 147px;
            }
            display: flex;
            align-items: center;
            padding-bottom: 8px;
            border-bottom: 1px solid #edeef0;
            justify-content: space-between;
        }
        .table-head-item {
            font-weight: 600;
            font-size: 10px;
            line-height: 140%;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            color: #8F98A2;
            white-space: nowrap;
        }
        .unselected-object {
            .add-room {
                border-bottom: 0;
            }
            .add-room > svg {
                top: -12px;
                left: 15px;
                height: 31px;
            }
        }
    }
}

@media (max-width: 1040px) {
    .registration-section {
        .title {
            font-size: 18px;
        }
        .object-data-section {
            &::after {
                width: calc(100% - 32px);
            }
            max-width: none;
            border-radius: 0;
        }
    }
}
@media (max-width: 760px) {
    .registration-section {
        .object-data-section {
            .title {
                padding: 0 16px;
            }
            padding-left: 0;
            padding-right: 0;
            padding-bottom: 10px;
        }
        .object-data-table {
            .table-head {
                .type-head {
                    width: 145px;
                    margin-right: 10px;
                    margin-left: 36px;
                }
                .quality-head {
                    width: 50px;
                    margin-right: 10px;
                }
                .personen-head {
                    width: 70px;
                    margin-right: 10px;
                }
                .price-head {
                    width: 80px;
                    margin-right: 7px;
                }
                .links-head {
                    width: 45px;
                    margin-right: 12px;
                }
                padding-left: 0;
                padding-right: 0;
            }
        }
    }
}
@media (max-width: 479px) {
    .registration-section {
        .object-data-table {
            .table-head {
                display: none;
            }
        }
    }
}

</style>

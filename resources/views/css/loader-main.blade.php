<style>

    .list-content .property .load-block-content {
        width: 100%;
        background: #FFFFFF;
        box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
        border-radius: 12px;
    }
    .list-content .property .load-block.big-load-block {
        width: 100%;
        height: 188px;
        background-color: #ffffff;
        padding: 16px;
        border-bottom: 1px solid #e8e8ed;
        display: flex;
        border-radius: 12px 12px 0 0;
    }
    .list-content .property .load-block.small-load-block {
        height: 62px;
        width: 100%;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #e8e8ed;
        background-color: #ffffff;
        padding: 16px;
        border-radius: 0 0 12px 12px;
    }
    .list-content .property .load-block .images-block {
        min-width: 156px;
        height: 156px;
        background: #EDEDEF;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .list-content .property .load-block .left-part {
        margin-right: 20px;
    }
    .list-content .property .load-block .middle-part {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 56.736%;
        margin-right: 88px;
    }
    .list-content .property .load-block .right-left {
        width: 100%;
        max-width: 380px;
        margin-right: 42px;
    }
    .list-content .property .load-block .bg {
        background: #EDEDED;
    }
    .list-content .property .load-block .height-item {
        height: 15px;
        border-radius: 100px;
    }
    .list-content .property .load-block .middle-gray-block {
        max-width: 320px;
        width: 100%;
    }
    .list-content .property .load-block .short-gray-block {
        max-width: 236px;
        width: 100%;
    }
    .list-content .property .load-block .long-gray-block {
        max-width: 380px;
        width: 100%;
    }
    .list-content .property .load-block .margin-bottom {
        margin-bottom: 13px;
    }
    .list-content .property .load-block .circle-gray-block {
        border-radius: 50%;
        width: 28px;
        height: 28px;
    }
    .list-content .property .load-block .bottom-block {
        display: flex;
        align-items: center;
    }
    .list-content .property .load-block .margin-right {
        margin-right: 6px;
    }
    .list-content .property .load-block .right-part {
        display: flex;
        width: 100%;
    }
    .list-content  .property .load-block .rectangle-content {
        padding-right: 14px;
        border-right: 1px solid #e8e8ed;
        display: flex;
        align-items: center;
        height: 100%;
    }
    .list-content .property .load-block .rectangle-block {
        width: 81px;
        height: 30px;
        border-radius: 6px;
    }
    .list-content .property .load-block .circle-content {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 16px;
        height: 100%;
    }
    .list-content .property .load-block .right-right {
        display: flex;
        align-items: center;
    }
    .list-content .property .load-block .load-main-block {
        display: flex;
        width: 100%;
    }
    .list-content .property .load-block .very-big-gray-block {
        width: 100%;
        max-width: 544px;
        margin-right: 40px;
    }
    .list-content .property .load-block .very-small-gray-block {
        width: 100%;
        max-width: 180px;
    }
    .list-content .property .load-block .very-small-gray-block:first-of-type {
        margin-right: 20px;
    }
    .list-content .property .load-block .very-small-block {
        width: 100%;
        max-width: 380px;
        margin-right: 42px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .list-content .property .load-block-item {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .list-content .property .place-card {
        width: 100%;
        height: 781px;
        background: #EDEDEF;
        display: none;
    }
    .list-content .property.show-map .place-card {
        display: block;
    }
    .list-content .property.show-map .load-block-content {
        display: flex !important;
    }
    .list-content .property.show-map .load-block.big-load-block {
        width: 740px
    }
    .list-content .property.show-map .load-block .right-left {
        display: none;
    }
    .list-content .property.show-map .load-block .right-part {
        display: flex;
        width: 46%;
    }
    .list-content .property.show-map .load-block .middle-part {
        width: 100%;
        margin-right: 66px;
    }
    .list-content .property.show-map .load-block .very-big-gray-block {
        display: none;
    }
    .list-content .property.show-map .load-block .very-small-block {
        margin-right: 45px;
        flex-direction: column;
        max-width: 517px;
        align-items: flex-start;
    }
    .list-content .property.show-map .load-block .very-small-gray-block:first-of-type {
        margin-right: 0;
        margin-bottom: 13px;
        max-width: none;
    }
    .list-content .property.show-map .load-block .very-small-gray-block:last-of-type {
        max-width: 331px;
    }
    @media (max-width: 1200px) {
        .list-content .property.show-map .load-block.big-load-block {
            width: 100%;
        }
        .list-content .property.show-map .load-block .very-small-block {
            max-width: none;
        }
        .list-content .property.show-map .load-block .right-part {
            width: 18%;
        }
        .list-content .property .place-card {
            height: 600px;
        }
    }
    @media (max-width: 1040px) {
        .list-content .property .load-block .images-block {
            min-width: 117px;
        }
        .list-content .property .load-block {
            height: auto;
        }
        .list-content .property .load-block .right-part {
            flex-direction: column;
            width: 61%;
            justify-content: space-between;
        }
        .list-content .property .load-block .circle-content {
            margin-left: 0;
        }
        .list-content .property .load-block .rectangle-content {
            padding-right: 12px;
            border-right: 0;
        }
        .list-content .property .load-block .right-right {
            justify-content: flex-end;
        }
        .list-content .property .load-block .long-gray-block:nth-of-type(5),
        .list-content .property .load-block .long-gray-block:nth-of-type(6) {
            display: none;
        }
        .list-content .property .load-block .right-left {
            margin-right: 0;
        }
        .list-content .property .load-block .middle-part {
            margin-right: 48px;
        }
        .list-content .property .load-block.small-load-block {
            display: none;
        }
        .list-content .property.show-map .load-block .right-left {
            display: block;
        }
        .list-content .property.show-map .load-block .middle-part {
            width: 100%;
            margin-right: 27px;
            max-width: 320px;
        }
        .list-content .property.show-map .load-block .right-part {
            width: 59%;
            align-items: flex-end;
        }
    }
    @media (max-width: 991px) {
        .list-content .property .place-card {
            height: 452px;
        }
    }
    @media (max-width: 770px) {
        .single-content .price-situation .collapse-content-line .price-item {
            padding: 0;
        }
        .single-content .top-bloc-collapse .price-item {
            padding: 0;
        }
        .single-content .parameters .parameters-left-block .title {
            padding: 0;
        }
    }
    @media (max-width: 720px) {
        .list-content .property .load-block .images-block {
            min-width: 96px;
        }
        .list-content .property .load-block .middle-part {
            margin-right: 0;
        }
        .list-content .property .load-block .bottom-block {
            display: none;
        }
        .list-content .property .load-block .right-left {
            display: none;
        }
        .list-content .property .load-block .load-main-block {
            flex-direction: column;
            justify-content: space-between;
        }
        .list-content .property .load-block .middle-part {
            width: 100%;
        }
        .list-content .property .load-block .right-part {
            width: 100%;
        }
        .list-content .property .load-block .right-right {
            justify-content: space-between;
        }
        .list-content .property.show-map .load-block .right-left {
            display: none;
        }
        .list-content .property.show-map .load-block .bottom-block {
            display: none;
        }
        .list-content .property.show-map .load-block .circle-content {
            display: none;
        }
        .list-content .property.show-map .load-block .middle-part {
            width: 100%;
            margin-right: 0;
            max-width: none;
        }
        .list-content .property.show-map .load-block .right-part {
            width: 100%;
            align-items: flex-start;
        }
    }
    @media (max-width: 575px) {
        .list-content .property .load-block .left-part {
            margin-right: 16px;
        }
        .list-content .property .load-block .images-block {
            height: 138px;
        }
        .list-content .property.show-map .load-block.big-load-block {
            height: 171px;
        }
        .list-content .property .place-card {
            height: 189px;
        }
        .list-content .property .load-block.big-load-block {
            height: 171px;
        }
    }
    @media (max-width: 400px) {
        .list-content .property .load-block .images-block {
            min-width: 81px;
        }
    }

</style>

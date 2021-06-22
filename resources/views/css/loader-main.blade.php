<style>

    .load-block-content {
        width: 100%;
        background: #FFFFFF;
        box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
        border-radius: 12px;
        max-width: 1180px;
        margin: auto;
    }
    .load-block.big-load-block {
        width: 100%;
        height: 188px;
        background-color: #ffffff;
        padding: 16px;
        border-bottom: 1px solid #e8e8ed;
        display: flex;
        border-radius: 12px 12px 0 0;
    }
    .load-block.small-load-block {
        height: 62px;
        width: 100%;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #e8e8ed;
        background-color: #ffffff;
        padding: 16px;
        border-radius: 0 0 12px 12px;
    }
    .load-block .images-block {
        min-width: 156px;
        height: 156px;
        background: #DEDEE2;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .load-block .left-part {
        margin-right: 20px;
    }
    .load-block .middle-part {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 56.736%;
        margin-right: 88px;
    }
    .load-block .right-left {
        width: 100%;
        max-width: 380px;
        margin-right: 42px;
    }
    .load-block .bg {
        background: #DEDEE2;
    }
    .load-block .height-item {
        height: 15px;
        border-radius: 100px;
    }
   .load-block .middle-gray-block {
        max-width: 320px;
        width: 100%;
    }
    .load-block .short-gray-block {
        max-width: 236px;
        width: 100%;
    }
    .load-block .long-gray-block {
        max-width: 380px;
        width: 100%;
    }
    .load-block .margin-bottom {
        margin-bottom: 13px;
    }
    .load-block .circle-gray-block {
        border-radius: 50%;
        width: 28px;
        height: 28px;
    }
    .load-block .bottom-block {
        display: flex;
        align-items: center;
    }
    .load-block .margin-right {
        margin-right: 6px;
    }
    .load-block .right-part {
        display: flex;
        width: 100%;
    }
    .load-block .rectangle-content {
        padding-right: 14px;
        border-right: 1px solid #e8e8ed;
        display: flex;
        align-items: center;
        height: 100%;
    }
    .load-block .rectangle-block {
        width: 81px;
        height: 30px;
        border-radius: 6px;
    }
    .load-block .circle-content {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 16px;
        height: 100%;
    }
    .load-block .right-right {
        display: flex;
        align-items: center;
    }
    .load-block .load-main-block {
        display: flex;
        width: 100%;
    }
    .load-block .very-big-gray-block {
        width: 100%;
        max-width: 544px;
        margin-right: 40px;
    }
    .load-block .very-small-gray-block {
        width: 100%;
        max-width: 180px;
    }
    .load-block .very-small-gray-block:first-of-type {
        margin-right: 20px;
    }
    .load-block .very-small-block {
        width: 100%;
        max-width: 380px;
        margin-right: 42px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .load-block-item {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .place-card {
        width: 100%;
        height: 781px;
        background: #EDEDEF;
        display: none;
    }
    .show-map .place-card {
        display: block;
    }
    .show-map .load-block-content {
        display: flex;
    }
    .show-map .load-block.big-load-block {
        width: 740px
    }
    .show-map .load-block .right-left {
        display: none;
    }
    .show-map .load-block .right-part {
        display: flex;
        width: 46%;
    }
    .show-map .load-block .middle-part {
        width: 100%;
        margin-right: 66px;
    }
    .show-map .load-block .very-big-gray-block {
        display: none;
    }
    .show-map .load-block .very-small-block {
        margin-right: 45px;
        flex-direction: column;
        max-width: 517px;
        align-items: flex-start;
    }
    .show-map .load-block .very-small-gray-block:first-of-type {
        margin-right: 0;
        margin-bottom: 13px;
        max-width: none;
    }
    .show-map .load-block .very-small-gray-block:last-of-type {
        max-width: 331px;
    }
    .head-load-block {
        height: 56px !important;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
    }
    .head-load-block .select {
        width: 115px;
        height: 30px;
        border-radius: 6px;
        background: #DEDEE2;
    }
    .head-load-block .left-part-item {
        display: flex;
        align-items: center;
    }
    .head-load-block .list,
    .head-load-block .map {
        min-width: 98px;
        height: 36px;
        margin-right: 10px;
        border-radius: 100px;
        background: #DEDEE2;
    }
    .head-load-block .found {
        min-width: 250px;
        height: 25px;
        border-radius: 6px;
        background: #DEDEE2;
    }


    @media (max-width: 1200px) {
        .show-map .load-block.big-load-block {
            width: 100%;
        }
        .show-map .load-block .very-small-block {
            max-width: none;
        }
        .show-map .load-block .right-part {
            width: 18%;
        }
        .place-card {
            height: 600px;
        }
    }
    @media (max-width: 1040px) {
        .load-block .images-block {
            min-width: 117px;
        }
        .load-block {
            height: auto;
        }
        .load-block .right-part {
            flex-direction: column;
            width: 61%;
            justify-content: space-between;
        }
        .load-block .circle-content {
            margin-left: 0;
        }
        .load-block .rectangle-content {
            padding-right: 12px;
            border-right: 0;
        }
        .load-block .right-right {
            justify-content: flex-end;
        }
        .load-block .long-gray-block:nth-of-type(5),
        .load-block .long-gray-block:nth-of-type(6) {
            display: none;
        }
        .load-block .right-left {
            margin-right: 0;
        }
        .load-block .middle-part {
            margin-right: 48px;
        }
        .load-block.small-load-block {
            display: none;
        }
        .show-map .load-block .right-left {
            display: block;
        }
        .show-map .load-block .middle-part {
            width: 100%;
            margin-right: 27px;
            max-width: 320px;
        }
        .show-map .load-block .right-part {
            width: 59%;
            align-items: flex-end;
        }
        .head-load-block .select {
            display: none;
        }
    }
    @media (max-width: 991px) {
        .place-card {
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
        .load-block .images-block {
            min-width: 96px;
        }
        .load-block .middle-part {
            margin-right: 0;
        }
        .load-block .bottom-block {
            display: none;
        }
        .load-block .right-left {
            display: none;
        }
        .load-block .load-main-block {
            flex-direction: column;
            justify-content: space-between;
        }
        .load-block .middle-part {
            width: 100%;
        }
        .load-block .right-part {
            width: 100%;
        }  .list-content .property .load-block .right-right {
            justify-content: space-between;
        }
        .show-map .load-block .right-left {
            display: none;
        }
        .show-map .load-block .bottom-block {
            display: none;
        }
        .show-map .load-block .circle-content {
            display: none;
        }
        .show-map .load-block .middle-part {
            width: 100%;
            margin-right: 0;
            max-width: none;
        }
        .show-map .load-block .right-part {
            width: 100%;
            align-items: flex-start;
        }
    }
    @media (max-width: 575px) {
        .load-block .left-part {
            margin-right: 16px;
        }
        .load-block .images-block {
            height: 138px;
        }
        .show-map .load-block.big-load-block {
            height: 171px;
        }
        .place-card {
            height: 189px;
        }
        .load-block.big-load-block {
            height: 171px;
        }
        .head-load-block {
            height: auto !important;
        }
        .head-load-block .left-part-item {
            flex-direction: column;
            padding: 16px 0;
            align-items: flex-start;
            width: 100%;
        }
        .head-load-block .list, .head-load-block .map {
            margin-right: 0;
            margin-bottom: 10px;
        }
    }
    @media (max-width: 400px) {
        .load-block .images-block {
            min-width: 81px;
        }
    }

</style>

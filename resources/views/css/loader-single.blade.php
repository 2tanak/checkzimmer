<style>

    .single-load-content {
        display: flex;
        margin-bottom: 40px;
        margin-top: 40px;
    }
    .single-load-content.hide {
        display: none;
    }
    .single-load-content .main-load-block {
        max-width: 882px;
        width: 100%;
        margin-right: 18px;
    }
    .single-load-content .top-block {
        margin-bottom: 17px;
        background-color: #FFFFFF;
        box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
        border-radius: 12px;
        padding: 16px 16px 3px 16px;
    }
    .single-load-content .images-block {
        width: 100%;
        height: 264px;
        background: #DEDEE2;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 29px;
    }
    .single-load-content .head-title-block {
        max-width: 736px;
        width: 100%;
        height: 22px;
        background: #DEDEE2;
        border-radius: 100px;
    }
    .single-load-content .subtitle-block {
        max-width: 505px;
        width: 100%;
        height: 15px;
        background: #DEDEE2;
        border-radius: 100px;
    }
    .single-load-content .top-block .head-title-block {
        margin-bottom: 18px;
    }
    .single-load-content .top-block .subtitle-block {
        margin-bottom: 28px;
    }
    .single-load-content .top-block-content {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .single-load-content .content-item {
        max-width: 423px;
        width: 100%;
        height: 15px;
        background: #DEDEE2;
        border-radius: 100px;
        margin-bottom: 13px;
    }
    .single-load-content .content-item:nth-of-type(odd) {
        margin-right: 4px;
    }
    .single-load-content .middle-block {
        width: 100%;
        background: #FFFFFF;
        box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
        border-radius: 12px;
        margin-bottom: 17px;
        padding: 30px 14px 24px 14px;
    }
    .single-load-content .middle-block .head-title-block {
        margin-bottom: 27px;
    }
    .single-load-content .middle-block .title {
        width: 98px;
        height: 15px;
        background: #DEDEE2;
        border-radius: 100px;
        margin-bottom: 14px;
    }
    .single-load-content .content-block {
        display: flex;
        align-items: center;
    }
    .single-load-content .content-block:not(:last-of-type) {
        margin-bottom: 6px;
    }
    .single-load-content .circle {
        min-width: 28px;
        height: 28px;
        background: #DEDEE2;
        border-radius: 50%;
        margin-right: 10px;
    }
    .single-load-content .line {
        width: 154px;
        height: 15px;
        background: #DEDEE2;
        border-radius: 100px;
    }
    .single-load-content .middle-block-item {
        margin-bottom: 40px;
    }
    .single-load-content .row:last-of-type .middle-block-item {
        margin-bottom: 0;
    }
    .single-load-content .bottom-block {
        background: #FFFFFF;
        box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
        border-radius: 12px;
        width: 100%;
        padding: 16px;
    }
    .single-load-content .bottom-block .head-block {
        display: flex;
        align-items: center;
        margin-bottom: 16px;
    }
    .single-load-content .bottom-block .head-block-item {
        margin-right: 20px;
        background: #DEDEE2;
        border-radius: 6px;
        width: 136px;
        height: 22px;
    }
    .single-load-content .bottom-block .footer-block {
        background: #DEDEE2;
        border-radius: 6px;
        width: 136px;
        height: 30px;
        margin-top: 3px;
    }
    .single-load-content .middle-content-block-item {
        max-width: 850px;
        width: 100%;
        height: 15px;
        background: #DEDEE2;
        border-radius: 100px;
        margin-bottom: 13px;
    }
    .single-load-content .load-sidebar {
        background: #FFFFFF;
        box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
        border-radius: 12px;
        min-width: 280px;
        max-width: 280px;
        width: 100%;
        height: 382px;
        padding: 16px;
    }
    .single-load-content .load-sidebar .sidebar-head {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        border-bottom: 1px solid #e3e4e6;
    }
    .single-load-content .load-sidebar .sidebar-head-item {
        margin-bottom: 17px;
        background: #DEDEE2;
        border-radius: 100px;
        width: 100%;
        height: 15px;
    }
    .single-load-content .load-sidebar .sidebar-footer {
        background: #DEDEE2;
        border-radius: 6px;
        width: 100%;
        height: 30px;
        margin-top: 11px;
    }
    .single-load-content .load-sidebar .sidebar-body {
        padding-bottom: 28px;
        border-bottom: 1px solid #e3e4e6;
        margin-top: 17px;
    }
    .single-load-content .load-sidebar .sidebar-body .small-block {
        background: #DEDEE2;
        border-radius: 6px;
        margin: auto;
        margin-bottom: 16px;
        width: 136px;
        height: 30px;
    }
    .single-load-content .load-sidebar .sidebar-body .big-block {
        margin-bottom: 12px;
        background: #DEDEE2;
        border-radius: 6px;
        width: 100%;
        height: 54px;
    }
    .single-load-content .load-sidebar .sidebar-body-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        flex-direction: row-reverse;
    }
    .single-load-content .load-sidebar .sidebar-body-item .address {
        margin-left: 16px;
        width: 100%;
    }
    .single-load-content .load-sidebar .sidebar-body-item .address-item {
        background: #DEDEE2;
        border-radius: 100px;
        height: 15px;
        margin-bottom: 13px;
    }
    .single-load-content .load-sidebar .sidebar-body-item .address-item:last-of-type {
        margin-bottom: 0;
    }
    .single-load-content .load-sidebar .sidebar-body-item .map {
        background: #DEDEE2;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 44px;
        height: 44px;
    }
    .single-load-content .load-sidebar-mobile {
        display: none;
    }
    .single-load-content .top-block-content-mobile .line-block {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 13px;
    }
    .single-load-content .top-block-content-mobile .line-block:last-of-type {
        margin-bottom: 0;
    }
    .single-load-content .top-block-content-mobile .block-item {
        background: #DEDEE2;
        height: 15px;
        border-radius: 100px;
        width: 127px;
        margin-right: 25px;
    }
    .single-load-content .top-block-content-mobile .circle-item {
        min-width: 30px;
        height: 30px;
        background: #DEDEE2;
        border-radius: 50%;
    }
    .single-load-content .top-block-content-mobile .title {
        width: 174px;
        height: 21px;
        background: #DEDEE2;
        border-radius: 100px;
        margin: 0 15px 16px 15px;
    }
    .single-load-content .top-block-content-mobile .mobile-block-item {
        width: 100%;
        min-height: 108px;
        padding: 20px 15px 12px 15px;
        border-bottom: 1px solid #e3e4e6;
    }
    .single-load-content .top-block-content-mobile .empty {
        width: 30px;
        height: 30px;
    }
    .single-load-content .top-block-content.top-block-content-mobile {
        padding: 30px 0;
        display: none;
    }
    .single-load-content .middle-block .head-title-block {
        width: 90px;
    }
    .single-load-content .bottom-block-mobile {
        display: none;
        padding: 0 !important;
    }
    .single-load-content .bottom-block-mobile .mobile-block {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #edeef0;
        padding: 18px 15px 18px 15px;
    }
    .single-load-content .bottom-block-mobile .content {
        width: 130px;
        height: 15px;
        border-radius: 100px;
        background: #DEDEE2;
        margin-right: 25px;
    }
    .single-load-content .bottom-block-mobile .circle-item {
        width: 17px;
        height: 17px;
        border-radius: 50%;
        background: #DEDEE2;
    }

    @media(max-width: 1210px) {
        .single-load-content .load-sidebar-desctope {
            display: none;
        }
        .single-load-content .main-load-block {
            max-width: none;
            margin-right: 0;
        }
        .single-load-content .load-sidebar-mobile {
            display: block;
            margin-left: 15px;
            background-color: transparent;
            box-shadow: none;
            padding: 0;
            height: 396px;
        }
        .single-load-content .mobile-images-sidebar {
            display: flex;
            background-color: #FFFFFF;
            box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
            margin-bottom: 22px;
            padding: 15px;
        }
        .single-load-content .top-block {
            border: 0;
        }
        .single-load-content .top-block {
            margin-bottom: 22px;
            box-shadow: none;
            border-radius: 0;
            background-color: transparent;
            padding: 0;
        }
        .single-load-content .load-sidebar .sidebar-body {
            padding-bottom: 16px;
        }
        .single-load-content .images-block {
            height: 396px;
            margin-bottom: 0;
        }
        .single-load-content .top-block .head-title-block {
            display: none;
        }
        .single-load-content .top-block .subtitle-block {
            display: none;
        }
        .single-load-content .top-block-content {
            background-color: #FFFFFF;
            box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
            margin-bottom: 22px;
            padding: 15px;
        }
        .single-load-content .content-item:nth-of-type(odd) {
            margin-right: 0;
        }
        .single-load-content .content-item {
            max-width: 49.7%;
        }
        .single-load-content .middle-block {
            border-radius: 0;
            margin-bottom: 21px;
            padding: 15px;
        }
        .single-load-content .bottom-block {
            border-radius: 0;
            padding: 15px;
        }
        .single-load-content .middle-content-block-item {
            max-width: none;
        }
    }
    @media (max-width: 991px) {
        .single-load-content .middle-block .row:nth-of-type(4) {
            display: none;
        }
        .single-load-content .middle-block .row:nth-of-type(5) {
            display: none;
        }
        .single-load-content .middle-block .row:nth-of-type(3) .middle-block-item {
            margin-bottom: 0;
        }
        .single-load-content .middle-block .link {
            width: 165px;
            height: 15px;
            border-radius: 100px;
            background: #DEDEE2;
            margin-top: 32px;
        }
    }
    @media (max-width: 767px) {
        .single-load-content .middle-block .row:nth-of-type(3) .middle-block-item {
            margin-bottom: 40px;
        }
        .single-load-content .middle-block .link {
            margin-top: 0;
        }
    }
    @media (max-width: 650px) {
        .single-load-content .mobile-images-sidebar {
            flex-direction: column;
        }
        .single-load-content .images-block {
            margin-bottom: 16px;
            height: 300px;
            order: 1;
        }
        .single-load-content .load-sidebar-mobile {
            margin-left: 0;
            width: 100%;
            max-width: none;
            min-width: auto;
            height: auto;
            order: 4;
        }
        .single-load-content .load-sidebar .sidebar-head {
            justify-content: center;
            width: 50%;
            margin: auto;
            border-bottom: 0;
        }
        .single-load-content .load-sidebar .sidebar-body {
            margin-top: 0;
            padding-top: 11px;
            border-top: 1px solid #e3e4e6;
        }
        .single-load-content .top-block .head-title-block {
            display: block;
            order: 2;
            margin-bottom: 8px;
        }
        .single-load-content .top-block .subtitle-block {
            display: block;
            order: 3;
            margin-bottom: 16px;
        }
        .single-load-content .top-block-content.top-block-content-desctop {
            display: none;
        }
        .single-load-content .top-block-content.top-block-content-mobile {
            display: block;
        }
    }
    @media (max-width: 575px) {
        .single-load-content .bottom-block-desctop {
            display: none;
        }
        .single-load-content .bottom-block-mobile {
            display: block;
        }
    }
    @media (max-width: 545px) {
        .single-load-content .load-sidebar .sidebar-head {
            width: 76%;
        }
    }
    @media (max-width: 420px) {
        .single-load-content .images-block {
            height: 200px;
        }
    }
    @media (max-width: 375px) {
        .single-load-content .load-sidebar .sidebar-head {
            width: 100%;
        }
    }

</style>

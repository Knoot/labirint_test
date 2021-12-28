<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Task 1</title>

<!-- Styles -->
<style>
    body {
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        background-color: #C4C4C4;
    }

    .weather,
    .exchange,
    #reset {
        background: #DAC1AE;
        box-shadow: 0px 0px 10px 1px rgba(173, 169, 165, 0.5);
    }

    .weather {
        position: relative;
        width: 180px;
        height: 82px;
        left: 36px;
        top: 33px;

        border-radius: 23px;
        padding: 20px 27px;
    }

    .weather>div {
        display: inline-block;
        margin-bottom: 4px;
    }

    .weather .city,
    .weather .date {
        font-size: 14px;
        line-height: 16px;
    }

    .weather .date {
        float: right;
    }

    .weather .temperature {
        font-size: 18px;
        line-height: 21px;
        width: 100%;
    }

    .weather .temperature .value {
        float: right;
    }

    .weather .description {
        font-size: 12px;
        line-height: 14px;
    }

    .exchange {
        position: relative;
        display: inline-block;
        top: 49px;

        border-radius: 10px;
        margin-left: 35px;
        padding: 27px 7px 7px 7px;
        margin-bottom: 23px;
    }

    .exchange .rate {
        font-size: 16px;
        line-height: 19px;
        margin-bottom: 10px;
    }

    .exchange .description {
        font-size: 14px;
        line-height: 16px;
        text-align: center;
    }

    #reset {
        position: absolute;
        top: 33px;
        right: 36px;
        width: 45px;
        padding: 9px;
        border-radius: 10px;
        cursor: pointer;
    }

    #reset .arrow-up,
    #reset .arrow-down {
        background-image: url('./assets/image/icon/Arrow.svg');
        background-position: right;
        width: 41px;
        height: 18px;
        padding: 0;
        margin: auto;
    }

    #reset .arrow-down {
        transform: rotate(180deg);
    }

</style>

<script src="./assets/js/jquery-3.6.0.min.js"></script>
<script src="./assets/js/script.js"></script>

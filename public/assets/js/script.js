const weather = $('.weather')
function updateWeather(data) {
    console.log('weather data', data)
    if (! data.success) {
        return
    }

    weather.find('.city').text(data.data.city)
    weather.find('.date').text(data.data.date)
    weather.find('.temperature:eq(0) .value').text(data.data.temperature + '°')
    weather.find('.temperature:eq(1) .value').text(data.data.comfort + '°')
    weather.find('.description').text(data.data.description)
}

function updateValute(data) {
    console.log('valute data', data)
    if (! data.success) {
        return
    }

    for (i in data.data) {
        const valute = data.data[i]
        const e = $(`#valute${valute.charCode}`)
        e.find('.rate').text(`1 ${valute.charCode} = ${valute.value} RUB`)
        e.find('.description').text(valute.description)
    };

}


$(() => {
    const resetBtn = $('#reset .container')

    resetBtn.on('click', function () {
        $.ajax('/api/weather')
            .done((data) => updateWeather(data))
            .fail((jqXHR, textStatus) =>
                console.error(`Request failed: ${textStatus}`))

        $.ajax('/api/valute')
            .done((data) => updateValute(data))
            .fail((jqXHR, textStatus) =>
                console.error(`Request failed: ${textStatus}`))
    })
})

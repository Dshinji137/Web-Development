// get weather: https://api.darksky.net/forecast/976fff9347b61923435ee2d065e721db/[latitude],[longitude]
const request = require("request");

var getWeather = (lat,lon,callback) => {
  //var lat = pos.lat;
  //var lon = pos.lon

  request ({
    url: `https://api.darksky.net/forecast/976fff9347b61923435ee2d065e721db/${lat},${lon}`,
    json: true
  }, (error,response,body) => {
    if(error) {
      callback("Unable to connect to Forecast.io");
    }
    else if(response.statusCode === 400) {
      callback("Unable to fetch weather");
    }
    else if(response.statusCode === 200) {
      callback(undefined,{
        temperature: body.currently.temperature,
        apparentTemperature: body.currently.apparentTemperature
      });
    }
  });

};

module.exports.getWeather = getWeather;

// Dark Sky API key: 976fff9347b61923435ee2d065e721db
// get request: https://api.darksky.net/forecast/976fff9347b61923435ee2d065e721db/[latitude],[longitude]

const yargs = require('yargs');
const geocode = require('./geocode/geocode');
const weather = require('./weather/weather');

const argv = yargs.options({
    a:{
      demand:true,
      alias: 'address',
      describe: 'address to fetch weather for',
      string: true
    }
  })
  .help().alias('help','h')
  .argv;

geocode.geocodeAddress(argv.address, (errorMessage,results) => {
  if(errorMessage) {
    console.log(errorMessage);
  }
  else {
    // address, and its temperature
    console.log(results.address);
    var lat = results.latitude;
    var lon = results.longitude;
    weather.getWeather(lat,lon,(errorMessage,weatherResults) =>{
      if(errorMessage) {
        console.log(errorMessage);
      }
      else {
        var currTemp = weatherResults.temperature;
        var appTemp = weatherResults.apparentTemperature;
        console.log(`It's currently ${currTemp}, it feels like ${appTemp}.`);
      }
    });
  }
});

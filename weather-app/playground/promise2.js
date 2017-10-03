const request = require('request');

var geocodeAddress = (address) => {
  return new Promise((resolve,reject) => {

    var encodedAddress = encodeURIComponent(address);
    request({
      url: `https://maps.googleapis.com/maps/api/geocode/json?address=${encodedAddress}`,
      json: true
    }, (error,response,body) => {
      if(!error && body.status === 'OK') {
        resolve({
          address: body.results[0].formatted_address,
          latitude: body.results[0].geometry.location.lat,
          longitude: body.results[0].geometry.location.lng
        });
      }
      else if(error){
        reject('Unabled to connect the server');
      }
      else if(body.status === 'ZERO_RESULTS') {
        reject('Unable to find the address');
      }
    });
  });
};

geocodeAddress('10025').then((location) => {
  console.log(JSON.stringify(location,undefined,2));
}, (errorMessage) => {
  console.log(errorMessage);
});

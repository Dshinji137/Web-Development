var asyncAdd = (a,b) => {
  return new Promise((resolve,reject) => {
    setTimeout(() => {
      if(typeof(a) === 'number' && typeof(b) === 'number') {
        resolve(a+b);
      }
      else {
        reject('arguments must be numbers');
      }
    },1000)
  });
};

asyncAdd('1',5).then((res) => {
  console.log('Results: ', res);
  return asyncAdd(res,'3');
}).then((res) => {
  console.log("should be 13",res);
}).catch((errorMessage) => {
  console.log(errorMessage);
});

/*
var somePromise = new Promise((resolve,reject) => {
  setTimeout(() => {
    //resolve("it worked");
    reject('Unable to fullfill promise');
  },3000);
});

somePromise.then((message) => {
  console.log('Success: ',message);
}, (errorMessage) => {
  console.log('Fail: ',errorMessage);
})
*/

function arrayFromRange(min, max) {
  const result = [];

  if (max < min) return result;

  for (let i = min; i <= max; i++) {
    result.push(i);
  }

  return result;
}

console.log(arrayFromRange(1, 5));
console.log(arrayFromRange(5, 1));


function includes(array, searchElement) {
  for (let element of array) {
    if (element === searchElement) {
      return true;
    }
  }
  return false;
}

console.log(includes([1, 2, 3], 2));
console.log(includes([1, 2, 3], 4));


function except(array, excluded) {
  const result = [];

  for (let element of array) {
    if (!excluded.includes(element)) {
      result.push(element);
    }
  }

  return result;
}

console.log(except([1, 2, 3, 4], [2, 3]));

function move(array, index, offset) {
  const position = index + offset;

  if (position < 0 || position >= array.length) {
    console.error("Invalid offset");
    return;
  }

  const output = [...array];
  const element = output.splice(index, 1)[0];
  output.splice(position, 0, element);

  return output;
}

const numbers = [1, 2, 3, 4];
console.log(move(numbers, 1, 2));
console.log(numbers); // array gốc không đổi


function countOccurrences(array, searchElement) {
  let count = 0;

  for (let element of array) {
    if (element === searchElement) count++;
  }

  return count;
}

console.log(countOccurrences([1, 2, 3, 2, 2], 2));


function getMax(array) {
  if (array.length === 0) return undefined;

  let max = array[0];
  for (let element of array) {
    if (element > max) {
      max = element;
    }
  }
  return max;
}

console.log(getMax([1, 5, 3, 9, 2]));

// cách 2 dùng reduce
function getMaxReduce(array) {
  if (array.length === 0) return undefined;

  return array.reduce((max, current) => {
    return current > max ? current : max;
  });
}

console.log(getMaxReduce([1, 5, 3, 9, 2]));


const movies = [
  { title: 'A', year: 2018, rating: 4.5 },
  { title: 'B', year: 2018, rating: 4.7 },
  { title: 'C', year: 2018, rating: 3 },
  { title: 'D', year: 2017, rating: 4.5 }
];

const result = movies
  .filter(movie => movie.year === 2018 && movie.rating > 4)
  .sort((a, b) => b.rating - a.rating)
  .map(movie => movie.title);

console.log(result); // ["B", "A"]

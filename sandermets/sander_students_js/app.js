/**
 * App built by following singelton module pattern
 * Have a read - http://addyosmani.com/resources/essentialjsdesignpatterns/book/
 * 
 * @author Sander <sandermets0@gmail.com>
 * @param {type} window
 * @param {Object} document
 * @param {Object} Math
 * @param {Object} JSON
 * @param {Object} console
 * @returns {undefined}
 */
(function (window, document, Math, JSON, Promise, console) {

    "use strict";
    {

        {
            /**
             * JS Base data of students 
             * @type Array
             */
            var pupils = [
                {
                    name: "ženja",
                    coder: false
                },
                {
                    name: "teearu",
                    coder: true
                },
                {
                    name: "kaire",
                    coder: true
                },
                {
                    name: "raiko",
                    coder: true
                },
                {
                    name: "eleri",
                    coder: true
                },
                {
                    name: "sander",
                    coder: false
                },
                {
                    name: "erika",
                    coder: true
                },
                {
                    name: "kristen",
                    coder: true
                },
                {
                    name: "keijo",
                    coder: true
                },
                {
                    name: "vaike",
                    coder: true
                },
                {
                    name: "ingmar",
                    coder: false
                },
                {
                    name: "ralf",
                    coder: true
                }
            ];
        }//DATA

        /**
         * Gets ignored in most mobile browsers and Safari
         * 
         * @type String
         */
        var defaultLocale = 'et';
        /**
         * 
         * @type String
         */
        var defaultProperty = 'name';
        /**
         * Id for pupil
         * we can access data with index (id - 1) 
         * if data sorted by defaultProperty
         * 
         * @type Number
         */
        var currentPupilId = -1;
        /**
         * 
         * @type String
         */
        var ajaxURL = 'http://final.local';
    }//VARIABLES

    {
        /**
         * Sorting
         * Be aware that inserted array gets sorted globally
         * 
         * @param {Array} array
         * @param {String} property
         * @returns {Array}
         */
        var sort = function (array, property) {

            if (array.length < 2) {
                return array;
            }
            var i, buf, j;
            for (i = (array.length - 1); i >= 0; i--) {
                for (j = i; j >= 0; j--) {
                    if (array[i][property].localeCompare(array[j][property], defaultLocale) < 0) {
                        buf = array[j];
                        array[j] = array[i];
                        array[i] = buf;
                    }
                }
            }
            return array;
        };
        /**
         * Used with forEach
         * 
         * @param {type} element
         * @param {type} index
         * @param {type} array
         * @returns {undefined}
         */
        var addId = function (element, index, array) {
            element.id = parseInt(index) + 1;
        };
        /**
         * Searches from array of object
         * Result contains id, and steps
         * if id is -1, not successful search
         * 
         * @param {String} search
         * @param {Array} array
         * @param {String} property
         * @returns {Object}
         */
        var binarySearch = function (search, array, property) {
            var result = {
                steps: 0,
                id: -1
            };
            var search = search.trim();
            if (search.length < 1) {
                return result;
            }
            var collectionLength = array.length;
            if (collectionLength < 1) {
                return result;
            }

            var args = {
                start: 0,
                end: collectionLength,
                mid: Math.floor(((0 + collectionLength) / 2))
            };


            var loop = function (array, search, args, result, property) {

                var name = array[args.mid][property];
                ++result.steps;
                if (search.localeCompare(name, defaultLocale) === 0) {
                    result.id = array[args.mid].id;
                    return; //found
                }

                if (args.end - args.start === 1) {
                    return; //not found
                }

                if (search.localeCompare(name, defaultLocale) < 0) {
                    args.end = args.mid;
                } else if (search.localeCompare(name, defaultLocale) > 0) {
                    args.start = args.mid;
                }

                args.mid = Math.floor((args.start + args.end) / 2);
                loop(array, search, args, result, property);
            };
            sort(array, property); //has to be sorted by property for bin search to work
            loop(array, search, args, result, property);
            sort(array, defaultProperty); //restore order by defaultProperty, now object is reachabel by (id - 1)

            return result;
        };
        /**
         * 
         * @returns {undefined}
         */
        var resetCurrent = function () {
            currentPupilId = -1;
            document.getElementById('repeated').innerHTML = '';
            document.getElementById("coding").checked = false;
            document.getElementById('update-status').innerHTML = "";
        };
        /**
         * Builds HTML table inner DOM
         * 
         * @returns {undefined}
         */
        var fillTable = function () {

            var tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0],
                    tableFoot = document.getElementById('dataTable').getElementsByTagName('tfoot')[0];
            while (tableBody.firstChild) {
                tableBody.removeChild(tableBody.firstChild);
            }

            while (tableFoot.firstChild) {
                tableFoot.removeChild(tableFoot.firstChild);
            }

            for (var i = 0; i < pupils.length; i++) {
                var row = tableBody.insertRow(i),
                        cell1 = row.insertCell(0),
                        cell2 = row.insertCell(1);
                cell1.innerHTML = pupils[i].name;
                if (pupils[i].coder) {
                    cell2.classList.add('coder');
                }
                cell1.classList.add('nameBg');
            }

            var row = tableFoot.insertRow(0),
                    cell1 = row.insertCell(0),
                    cell2 = row.insertCell(1);
            cell1.innerHTML = 'Kokku';
            cell2.innerHTML = pupils.length;
        };
        /**
         * 
         * @returns {undefined}
         */
        var search = function () {
            resetCurrent();
            var search = document.getElementById('name').value.trim();
            var r = binarySearch(search, pupils, defaultProperty);
            document.getElementById('repeated').innerHTML = "korduste arv: " + r.steps.toString();
            if (r.id > 0) {
                currentPupilId = r.id;
                document.getElementById('update-status').innerHTML = "Leiti õpilane: " + pupils[currentPupilId - 1].name;
                document.getElementById("coding").checked = pupils[currentPupilId - 1].coder;
                document.getElementById("name").value = pupils[currentPupilId - 1].name;
                fillTable();
            } else {
                document.getElementById('update-status').innerHTML = "Sellist õpilast pole";
            }
        };
        /**
         * 
         * @param {Object} params
         * @returns {undefined}
         */
        var makeRequest = function (params) {

            var xhttp = new XMLHttpRequest();
            if (params.method === 'GET') {
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        pupils = sort(JSON.parse(xhttp.responseText), defaultProperty);
                        sort(pupils, defaultProperty).forEach(addId);
                        fillTable();
                        search();
                    }
                };
                xhttp.open(params.method, ajaxURL + '?get=list', true);
                xhttp.send();
            } else if (params.method === 'POST') {

                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {

                        var result = JSON.parse(xhttp.responseText);
                        if (result.success) {
                            console.log(result);
                        } else {
                            console.log(result);
                        }

                    } else if (xhttp.readyState === 4 && xhttp.status !== 200) {
                        console.log(xhttp.statusText);
                    }
                };
                xhttp.open(params.method, ajaxURL, true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(params.params);
            }
        };
    }//FUNCTIONS

    {
        sort(pupils, defaultProperty).forEach(addId);
    }//MAIN

    {
        /**
         * JS search
         * 
         * @param {Array} event
         * @returns {Boolean}
         */
        document.getElementById("search-by-name").onclick = function (event) {

            event.preventDefault();
            search();
        };
        /**
         * Show hide table of pupils
         * 
         * @param {Array} event
         * @returns {Boolean}
         */
        document.getElementById("toggle-table").onclick = function (event) {

            event.preventDefault();
            var t = document.getElementById('table-container'),
                    hidden = false;
            for (var i = 0; i < t.classList.length; i++) {
                if (t.classList[i] === 'hide') {
                    hidden = true;
                    break;
                }
            }
            if (hidden) {
                fillTable();
                t.classList.remove('hide');
                document.getElementById('toggle-table').innerHTML = 'Peida';
            } else {
                t.classList.add('hide');
                document.getElementById('toggle-table').innerHTML = 'Kuva';
            }
        };
        /**
         * Save pupil data
         * 
         * @param {Array} event
         * @returns {Boolean}
         */
        document.getElementById("save-data").onclick = function (event) {

            event.preventDefault();
            if (currentPupilId < 0) {
                return;
            }

            var coder = document.getElementById("coding").checked,
                    name = document.getElementById("name").value.trim();
            pupils[(currentPupilId - 1)].coder = coder;
            pupils[(currentPupilId - 1)].name = name;
            document.getElementById('name').value = '';
            sort(pupils, defaultProperty).forEach(addId); //if name changes

            makeRequest({
                method: 'POST',
                params: 'name=' + name + '&coder=' + coder + '&id=' + currentPupilId
            });
            resetCurrent();
            fillTable();
        };
        /**
         * Save pupil data
         * 
         * @param {Array} event
         * @returns {Boolean}
         */
        document.getElementById("search-by-name-ajax").onclick = function (event) {

            event.preventDefault();
            makeRequest({
                method: 'GET'
            });
        };
    }//EVENTS

    {
        if (window.location.href.indexOf('runAllTESTS') > -1) {

            /**
             * 
             * @type app_L13.Promise
             */
            var jsTests = new Promise(
                    /**
                     * 
                     * @param {type} resolve
                     * @param {type} reject
                     * @returns {undefined}
                     */
                            function (resolve, reject) {

                                var t = {
                                    success: false,
                                    assertions: 0,
                                    failures: 0
                                };
                                var k;
                                for (k in pupils) {
                                    var r = binarySearch(pupils[k].name, pupils, defaultProperty);
                                    t.assertions += 2;
                                    if (r.id < 1) {
                                        t.failures++;
                                    } else if (pupils[k].name === pupils[r.id - 1]) {
                                        t.failures++;
                                    }
                                }
                                var r = binarySearch('asdas', pupils, defaultProperty);
                                t.assertions++;
                                if (r.id > 0) {
                                    t.failures++;
                                }

                                var r = binarySearch('  ', pupils, defaultProperty);
                                t.assertions++;
                                if (r.id > 0) {
                                    t.failures++;
                                }
                                t.assertions++;
                                if (r.steps > 0) {
                                    t.failures++;
                                }

                                var r = binarySearch('sander', [], defaultProperty);
                                t.assertions++;
                                if (r.id > 0) {
                                    t.failures++;
                                }
                                t.assertions++;
                                if (r.steps > 0) {
                                    t.failures++;
                                }
                                if (t.failures === 0) {
                                    t.success = true;
                                }

                                resolve('JS: ' + JSON.stringify(t));

                            });

                    var phpTests = new Promise(function (resolve, reject) {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function () {
                            if (xhttp.readyState === 4 && xhttp.status === 200) {
                                resolve('PHP: ' + xhttp.responseText);
                            } else if (xhttp.readyState === 4 && xhttp.status !== 200) {
                                reject(xhttp);
                            }
                        };
                        xhttp.open('GET', ajaxURL + '?runTESTS', true);
                        xhttp.send();
                    });

                    Promise.all([phpTests, jsTests]).then(function (results) {
                        results.forEach(function (element, index, array) {
                            console.log(element);
                        });
                    });
                }

    }//TEST
}(window, document, Math, JSON, Promise, console)); //import global objects


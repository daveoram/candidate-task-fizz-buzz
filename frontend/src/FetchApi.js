import React, {useState} from "react";

function FetchAPI() {

	// Data from API and form input values.
	const [data, setData] = useState([]);
	const [inputs, setInputs] = useState({});

	// Validation.
	const [errorStart, setErrorStart] = useState('');
	const [errorEnd, setErrorEnd] = useState('');
	const [errorCompare, setErrorCompare] = useState('');


	const handleChange = (event) => {
		event.persist();
		setInputs((input)=>({
			...inputs,
			[event.target.name]:event.target.value,
		}));
	}  //  End  - handleChange.


	const handleSubmit = (event) => {
		event.preventDefault();

		if (handleValidation()) {

			//  GET Request.  This is appropriate for a small application like this where we are just fetching data.
			apiGet();

			//  POST Request also implemented and working.  This would be more appripriate if this application was to be fleshed out into a full blown REST API.
			//apiPost();

			console.log(inputs);
		      
	  	}  //  End - if (handleValidation()).
	}  //  End  - handleSubmit.


	const handleValidation = () => {
		let formIsValid = true;

		// Reset Error messages.
		setErrorStart('');
		setErrorEnd('');
		setErrorCompare('');
		
		if (inputs.start === '' || inputs.start == null) {
			console.log('handleValidation inputs.start blank validation returns FALSE');
			setErrorStart('Starting number cannot be blank! ');
			formIsValid = false;
		}

		if (inputs.end === '' || inputs.end == null) {
			console.log('handleValidation inputs.end blank validation returns FALSE');
			setErrorEnd('Ending number cannot be blank!');
			formIsValid = false;
		}

		if (parseInt(inputs.start) < 1) {
			console.log('handleValidation inputs.start < 1 validation returns FALSE');
			setErrorStart('Starting number must be greater than 0!');
			formIsValid = false;
		}	

		if (parseInt(inputs.end) > 1000) {
			console.log('handleValidation inputs.end  >1000 validation returns FALSE');
			setErrorEnd('Ending number limit is 1000!');
			formIsValid = false;
		}	

		if (parseInt(inputs.start) > parseInt(inputs.end)) {
			console.log('handleValidation inputs.start > inputs.end validation returns FALSE');
			setErrorCompare('Starting number cannot be greater than Ending number!');
			formIsValid = false;
		}
		
		return formIsValid;
	}  //  End  - handleValidation.


	const apiGet = () => {
		fetch('http://127.0.0.1:8000/api/results/'+parseInt(inputs.start)+'/'+parseInt(inputs.end)+'')
			.then((response) => response.json())
			.then((json) => {
		  		console.log(json);
	  			setData(json);
	  		});
	}  //  End  - apiGet.

/*
	const apiPost = () => {
			fetch('http://127.0.0.1:8000/api/results', {
				method: 'POST',
				body: JSON.stringify({
	    			start: parseInt(inputs.start),
	    			end: parseInt(inputs.end),
	  			}),
				headers: {
					'Content-type': 'application/json; charset=UTF-8',
					'Accept': 'application/json',
				},
			})
				.then((response) => response.json())
				.then((json) => {
					console.log(json);
		  			setData(json);
		  		});
	}  //  End  - apiPost.
*/

	return (
		<div className="center">
			<form id="calc" onSubmit={handleSubmit}>
				<input type="number" name="start" placeholder="Starting Number" onChange={handleChange} />
				<input type="number" name="end" placeholder="Ending Number" onChange={handleChange} />
				<button type="submit" form="calc" value="Submit" className="button">Calculate</button>
			</form>

			<span id="startingerror" className="error">{errorStart}{errorCompare}</span>
			<span id="endingerror" className="error">{errorEnd}</span>

			<hr className="hrmargin" />

			<div className="left">
				<ul className="clean">
				
					{data.map((item) => (
						<li key={item.number}>
							{item.number}. {item.result}
						</li>
					))}

				</ul>
			</div>

		</div>
	);  // End - return the View.

}  // End - function FetchAPI() 

export default FetchAPI;
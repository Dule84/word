import React, {useState} from "react";
import axios from 'axios';

function GameForm() {
    const [word, setWord] = useState('');
    const [message, setMessage] = useState('');

    const validateWord = () => {
        axios.post('/api/validate', { word })
            .then(response => {
                setMessage(response.data.message)
            })
            .catch(error => {
                setMessage(error.response.data.detail)
            });
    };

    return (
        <div>
            <form>
                <input
                    required
                    type="text"
                    placeholder="Enter a word"
                    value={word}
                    onChange={e => setWord(e.target.value)}
                />
                <button type="button" onClick={validateWord}>Submit</button>
            </form>
            <p>{message}</p>
        </div>
    );
}

export default GameForm
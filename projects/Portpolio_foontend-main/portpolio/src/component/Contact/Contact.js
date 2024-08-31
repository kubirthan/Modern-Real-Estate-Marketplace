import { IconButton } from '@mui/material';
import React from 'react';
import { Element } from 'react-scroll/modules';
import {Facebook,Instagram,LinkedIn} from '@material-ui/icons';
import './Contact.css';

const Contact = () => {
  return (
    <Element className="contact" id="contact">
        <h1>Contact</h1>
        <div className='contact__container'>
            <p>
                Email : <span>kubirthan7991@gmail.com</span>
            </p>
            <p>
                Github Username : <span>@kmkubi</span>
            </p>
            <div className='contact__icons'>
                <a href='google.com'>
                    <IconButton>
                        <LinkedIn/>
                    </IconButton>
                </a>

                <a href='google.com'>
                    <IconButton>
                        <Facebook/>
                    </IconButton>
                </a>

                <a href='google.com'>
                    <IconButton>
                        <Instagram/>
                    </IconButton>
                </a>

            </div>
        </div>

    </Element>
  )
}

export default Contact
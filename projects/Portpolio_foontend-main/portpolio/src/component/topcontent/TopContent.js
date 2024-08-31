import React from 'react'
import { Link } from 'react-scroll/modules';
import './TopContent.css';

const TopContent = () => {
  return (
    <div className='topcontent'>
        <div className='topcontent__container'>
            <h1>Mr. M Kubirthan</h1>
            <p>A software engineer</p>
            <a href='www.google.com'>
                <button className='topcontent__downloadbutton'>Download CV</button>
            </a>
            <Link to="projects" smooth={true} duration={200}>
                <button className='topcontent__workbutton'>My work</button>
            </Link>
        </div>
    </div>
  )
}

export default TopContent
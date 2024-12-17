import React from 'react';
import { Element } from 'react-scroll/modules';
import Experience from '../experienceBox/Experience';
import './ExperienceContainer.css';

const ExperienceContainer = () => {
  return (
    <Element className="experienceContainer" id="exp">
        <h1>Experience</h1>
        <div className='experienceContainer__info'>
            <Experience number="10+" title="Clients"/>
            <Experience number="60+" title="Projects" style={{backgroundColor:"#f64c08"}}/>
            <Experience number="6+" title="Years Teaching"/>
            <Experience number="6000+" title="Students got trained"/>
        </div>
    </Element>
  )
}

export default ExperienceContainer
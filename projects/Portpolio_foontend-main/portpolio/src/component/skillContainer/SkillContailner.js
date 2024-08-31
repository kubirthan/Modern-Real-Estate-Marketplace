import React from 'react';
import { Element } from 'react-scroll/modules';
import skillImg from '../../assets/skilset.jpg';
import './SkillContainer.css';
import LinearProgress from '@mui/material/LinearProgress';


export const SkillContailner = () => {
  return (
    <Element className="skillcontainer" id="skills">
        <div className='skillContainer__img'>
        <img src={skillImg} alt=''/>
        </div>
        <div className='skillContainer__text'>
            <h2>SKILLSET</h2>
            <div className='skillContainer__skillset'>
                <h5>React</h5>
                <div className='skillContainer__slider skillContainer__slider1'>
                <LinearProgress variant="determinate" value={30}/>
                </div>
            </div>

            <div className='skillContainer__skillset'>
                <h5>Angular</h5>
                <div className='skillContainer__slider skillContainer__slider2'>
                <LinearProgress variant="determinate" value={100}/>
                </div>
            </div>

            <div className='skillContainer__skillset'>
                <h5>Node.js</h5>
                <div className='skillContainer__slider skillContainer__slider3'>
                <LinearProgress variant="determinate" value={80}/>
                </div>
            </div>

            <div className='skillContainer__skillset'>
                <h5>Express.js</h5>
                <div className='skillContainer__slider skillContainer__slider4'>
                <LinearProgress variant="determinate" value={90}/>
                </div>
            </div>

            <div className='skillContainer__skillset'>
                <h5>MongoDB</h5>
                <div className='skillContainer__slider skillContainer__slider5'>
                <LinearProgress variant="determinate" value={60}/>
                </div>
            </div>

            <div className='skillContainer__skillset'>
                <h5>Mysql</h5>
                <div className='skillContainer__slider skillContainer__slider6'>
                <LinearProgress variant="determinate" value={40}/>
                </div>
            </div>

            <div className='skillContainer__skillset'>
                <h5>Html</h5>
                <div className='skillContainer__slider skillContainer__slider7'>
                <LinearProgress variant="determinate" value={70}/>
                </div>
            </div>

            <div className='skillContainer__skillset'>
                <h5>css</h5>
                <div className='skillContainer__slider skillContainer__slider8'>
                <LinearProgress variant="determinate" value={70}/>
                </div>
            </div>

            <div className='skillContainer__skillset'>
                <h5>Sass</h5>
                <div className='skillContainer__slider skillContainer__slider9'>
                <LinearProgress variant="determinate" value={70}/>
                </div>
            </div>

            <div className='skillContainer__skillset'>
                <h5>Javascript</h5>
                <div className='skillContainer__slider skillContainer__slider10'>
                <LinearProgress variant="determinate" value={70}/>
                </div>
            </div>

            <div className='skillContainer__skillset'>
                <h5>Java</h5>
                <div className='skillContainer__slider skillContainer__slider11'>
                <LinearProgress variant="determinate" value={50}/>
                </div>
            </div>

            <div className='skillContainer__skillset'>
                <h5>Redux-toolkit</h5>
                <div className='skillContainer__slider skillContainer__slider12'>
                <LinearProgress variant="determinate" value={90}/>
                </div>
            </div>
        </div>
    </Element>
  )
}

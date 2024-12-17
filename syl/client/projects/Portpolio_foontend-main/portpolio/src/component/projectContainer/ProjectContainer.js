import React from 'react'
import Project from '../project/Project';
import { Element } from 'react-scroll/modules';
import proImg from '../../assets/hand11.jpg';
import './ProjectContainer.css';

const ProjectContainer = () => {
    const projects = [{
        img:{proImg},
        title:"facebook",
        desc:"i have done the fullstack facebook app",
        link:"www.google.com"

    },
    {
        img:{proImg},
        title:"facebook",
        desc:"i have done the fullstack facebook app",
        link:"www.google.com"

    },
    {
        img:{proImg},
        title:"facebook",
        desc:"i have done the fullstack facebook app",
        link:"www.google.com"

    },
    {
        img:{proImg},
        title:"facebook",
        desc:"i have done the fullstack facebook app",
        link:"www.google.com"

    },
    {
        img:{proImg},
        title:"facebook",
        desc:"i have done the fullstack facebook app",
        link:"www.google.com"

    },
    {
        img:{proImg},
        title:"facebook",
        desc:"i have done the fullstack facebook app",
        link:"www.google.com"

    },
];

  return (
    <Element className="projectContainer" id="projects">
        <h1>Projects</h1>
        <p>
            Here are some projects which i done for making lives of people easy.
        </p>
        <div className='projectContainer__projects'>
            {projects.map((project,index)=>{
                    return(
                        <Project
                        key={index}
                        img={project.img}
                        title={project.title}
                        desc={project.desc}
                        link={project.link}/>
                    );
                })
            }
        </div>
    </Element>
  )
}

export default ProjectContainer;
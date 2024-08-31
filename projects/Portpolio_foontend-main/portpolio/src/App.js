import React from 'react';
import { Header } from './component/header/Header';
import TopContainer from './component/topcontainer/TopContainer';
import { SkillContailner } from './component/skillContainer/SkillContailner';
import ProjectContainer from './component/projectContainer/ProjectContainer';
import './App.css';
import ExperienceContainer from './component/experienceContainer/ExperienceContainer';
import Contact from './component/Contact/Contact';

const App = () => {
  return (
    <div>
      <Header/>
      <TopContainer/>
      <SkillContailner/>
      <ProjectContainer/>
      <ExperienceContainer/>
      <Contact/>
    </div>
  )
}

export default App;
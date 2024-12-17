import React from 'react';
import { Element } from 'react-scroll/modules';
import TopContent from '../topcontent/TopContent';
import './TopContainer.css';

const TopContainer = () => {
  return (
    <Element name="about" className="topcontainer">
        <TopContent/>
    </Element>
  );
};

export default TopContainer
import React, { useEffect, useState } from 'react';

function MainContent() {
  const [studentNames, setStudentNames] = useState([]);

  useEffect(() => {
    fetch('api/students')
      .then(response => response.json())
      .then(data => setStudentNames(data));
  }, []);

  return (
    <main className="container mx-auto py-10">
      <h1 className="text-3xl font-bold mb-8">Ongoing Applications</h1>
      <div className="bg-white shadow overflow-hidden sm:rounded-lg">
        <div className="px-4 py-5 sm:px-6">
          <h3 className="text-lg leading-6 font-medium text-gray-900">Students</h3>
        </div>
        <div className="border-t border-gray-200">
          <dl>
            {studentNames.map((student, index) => (
              <div key={index} className="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt className="text-sm font-medium text-gray-500">{student.firstName} {student.lastName}</dt>
              </div>
            ))}
          </dl>
        </div>
      </div>
    </main>
  );
}

export default MainContent;

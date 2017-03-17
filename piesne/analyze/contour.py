from music21 import *
import sys, getopt

xmlfile=str(sys.argv[1])

s = converter.parse(xmlfile)

notes = []
recursiveScore = s.recurse()
allNotes = recursiveScore.notes
initialRestOffset = allNotes[0].offset
initialFrequency=allNotes[0].pitch.frequency
initialNote=allNotes[0]
previousNote=initialNote
previousFrequency=initialFrequency
for n in allNotes:
    noteEntry = {}
    noteEntry["frequency"] = 'rest'

    noteEntry["offset"] = float(n.getOffsetBySite(recursiveScore)) - initialRestOffset
    noteEntry["duration"] = float(n.quarterLength)

    if n.isNote:
        noteEntry["note"]=n.pitch.nameWithOctave
        noteEntry["numDiff"]=interval.notesToChromatic(initialNote,n).semitones
        noteEntry["numChange"]=interval.notesToChromatic(previousNote,n).semitones 
        if noteEntry["numChange"]>=0:
            noteEntry["incipit"]=1
        else:
            noteEntry["incipit"]=0

        noteEntry["frequency"] = n.pitch.frequency
        #noteEntry["num"]=n.pitch.alter

        previousFrequency=noteEntry["frequency"]
        previousNote=n
        notes.append(noteEntry)
    
    
       

print(notes)

